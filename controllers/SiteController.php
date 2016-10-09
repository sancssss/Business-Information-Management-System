<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\FormModel\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\User;
use app\models\User1Details;
use app\models\User2Details;
use app\models\FormModel\SignupForm;
use app\models\FormModel\SpecialSignupForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    
    public function actionLogin()
    {
        return $this->redirect(['site/index']);
    }
    
    /**
     * 普通用户注册
     * If creation is successful, the browser will be redirected to the 'personal_center' page.
     * @return mixed
     */
    public function actionSignup()
    {
       $user = new User();
       $userInfo = new User1Details();
       $form = new SignupForm();
       //数据存在form模型中并且验证
       if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $user->user_name = $form->user_name;
            $user->user_password = md5($form->user_password);
            $user->user_identityid = User::ROLE_NOCHECK_USER;
            $user->save();
            $userInfo->user_id = $user->user_id;
            $userInfo->some_info = $form->some_info;
            $userInfo->save();
            $identity = User::findOne($userInfo->user_id);
            //设置角色
            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole('nochecked_user');
            $auth->assign($userRole, $userInfo->user_id);
            Yii::$app->user->login($identity, 0);
            return $this->redirect(['user/index']);
        } else {
            return $this->render('signup', [
                'model' => $form,
            ]);
        }
    }
    
    /**
     * 
     * 特殊用户注册
     * @return view
     */
     public function actionSpecialSignup()
    {
       $user = new User();
       $userInfo = new User2Details();
       $form = new SpecialSignupForm();
       //数据存在form模型中并且验证
       if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $user->user_name = $form->user_name;
            $user->user_password = md5($form->user_password);
            $user->user_identityid = User::ROLE_NOCHECK_MANAGER;
            $user->save();
            $userInfo->userid = $user->user_id;//in user2_details , 'userid'
            $userInfo->some_info = $form->some_info;
            $userInfo->save();
            $identity = User::findOne($userInfo->userid);
            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole('nochecked_manager_user');
            $auth->assign($userRole, $userInfo->userid);
            Yii::$app->user->login($identity, 0);
            return $this->redirect(['manager/index']);
        } else {
            return $this->render('special_signup', [
                'model' => $form,
            ]);
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $identity = Yii::$app->user->identity;
            $id = $identity->user_id;
            $user_identityid = $identity->user_identityid;
            if($user_identityid == 1 || $user_identityid == 3){
                return $this->redirect(['user/index']);
            }else{
                return $this->redirect(['manager/index']);
            }        
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message = "hello"){
        return $this->render('say',['message' => $message]);
    }

    public function actionEntry(){
        $model = new EntryForm;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return $this->render('entry-confirm', ['model'=>$model]);
        }else{
            return $this->render('entry', ['model'=>$model]);
        }
    }
}
