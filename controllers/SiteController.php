<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\form\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\user\User;
use app\models\user\CompanyUserDetails;
use app\models\user\AdminUserDetails;
use app\models\form\SignupForm;
use app\models\form\AdminSignupForm;
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
     * 企业用户注册
     * If creation is successful, the browser will be redirected to the 'personal_center' page.
     * @return mixed
     */
    public function actionSignupCompanyUser()
    {
       $user = new User();
       $companyUser = new CompanyUserDetails();
       $form = new SignupForm();
       //数据存在form模型中并且验证
       if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $user->user_name = $form->user_name;
            $user->user_password = md5($form->user_password);
            $user->user_identityid = User::NOTCHECK_COMPANY;
            $user->save();
            $companyUser->user_id = $user->user_id;
            $companyUser->user_nickname = $form->user_nickname;
            $companyUser->user_phone_number = $form->user_phone_number;
            $companyUser->user_sex = $form->user_sex;
            $companyUser->user_email = $form->user_email;
            $companyUser->user_comment = $form->user_comment;
            $companyUser->save();
            $identity = User::findOne($user->user_id);
            //设置角色
            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole('notcheck_company');
            $auth->assign($userRole, $user->user_id);
            Yii::$app->user->login($identity, 0);
            return $this->redirect(['site/index']);
        } else {
            return $this->render('signup-company-user', [
                 'model' => $form,
            ]);
        }
    }
    
    public function actionSignupAdminUser(){
       $user = new User();
       $adminUser = new AdminUserDetails();
       $form = new AdminSignupForm();
       //数据存在form模型中并且验证
       if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            //return print_r($form);
            $user->user_name = $form->user_name;
            $user->user_password = md5($form->user_password);
            //更具提供的表单决定type
            if($form->signup_type == 1){
                $user->user_identityid = User::NOTCHECK_COUNTY_ADMIN;
                $roleName = 'notcheck_county_admin';
            }else{
                $user->user_identityid = User::NOTCHECK_CITY_ADMIN;
                $roleName = 'notcheck_city_admin';
            }
            $user->save();
            $adminUser->user_id = $user->user_id;
            $adminUser->user_nickname = $form->user_nickname;
            $adminUser->user_phone_number = $form->user_phone_number;
            $adminUser->user_sex = $form->user_sex;
            $adminUser->user_email = $form->user_email;
            $adminUser->user_birthday = $form->user_birthday;
            $adminUser->user_id_number = $form->user_id_number;
            $adminUser->user_address = $form->user_address;
            $adminUser->user_zip_code = $form->user_zip_code;
            $adminUser->user_legal_person = $form->user_legal_person;
            $adminUser->user_comment = $form->user_comment;
            $adminUser->user_type = $form->user_type;
            $adminUser->region_id = $form->region_id;
            $adminUser->save();
           // return print_r($adminUser->getErrors());
            $identity = User::findOne($user->user_id);
            //设置角色
            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole($roleName);
            $auth->assign($userRole, $user->user_id);
            Yii::$app->user->login($identity, 0);
            return $this->redirect(['site/index']);
        } else {
            return $this->render('signup-admin-user', [
                 'model' => $form,
            ]);
        }
    }
    

    /**
     * 首页默认进入登录页面
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $identity = Yii::$app->user->identity;
            $user_identityid = $identity->user_identityid;
            switch ($user_identityid){
                case User::NOTCHECK_COMPANY:
                case User::COMPANY:
                    return $this->redirect(['company-user/index']);
                case User::NOTCHECK_COUNTY_ADMIN:
                case User::COUNTY_ADMIN:
                    return $this->redirect(['county-admin/index']);
                case User::NOTCHECK_CITY_ADMIN:
                case User::CITY_ADMIN:
                    return $this->redirect(['city-admin/index']);
                case User::NOTCHECK_PROVINCE_ADMIN:
                case User::PROVINCE_ADMIN:
                    return $this->redirect(['province-admin/index']);
                case User::SYSTEM_ADMIN:
                    return $this->redirect([]);
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
