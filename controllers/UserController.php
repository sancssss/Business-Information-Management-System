<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\User1Details;
use app\models\User2Details;
use app\models\SignupForm;
use app\models\SpecialSignupForm;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\rbac\DbManager;
/**
 * YiiUserController implements the CRUD actions for YiiUser model.
 */
class UserController extends Controller
{
    
    
    
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['personal-center', 'special-personal-center'],
                //非登陆用户无法进入个人中心
                'rules' => [
                     [
                        'allow' => 'true',
                        'actions' => ['personal-center'],
                        'roles' => ['nochecked_user'],
                    ],
                     [
                        'allow' => 'true',
                        'actions' => ['special-personal-center'],
                        'roles' => ['manager_user'],
                    ],
                ]
            ],
        ];
    }

    /**
     * Lists all YiiUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YiiUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionPersonalCenter($id)
    {
        return $this->render('personal_center', [
            'model' => $this->findModel($id),
        ]);
    }
    
    
    public function actionSpecialPersonalCenter($id)
    {
        return $this->render('special_personal_center', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new YiiUser model.
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
            $user->user_identityid = User::ROLE_USER;
            $user->save();
            $userInfo->user_id = $user->user_id;
            $userInfo->some_info = $form->some_info;
            $userInfo->save();
            $identity = User::findOne($userInfo->user_id);
            //设置角色
            $auth = \Yii::$app->authManager;
            $userRole = $auth->getRole('nochecked_user');
            $auth->assign($userRole, $userInfo->user_id);
            Yii::$app->user->login($identity, 0);
            return $this->redirect(['personal-center', 'id' => $userInfo->user_id]);
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
            $user->user_identityid = User::ROLE_MANAGER;
            $user->save();
            $userInfo->userid = $user->user_id;//in user2_details , 'userid'
            $userInfo->some_info = $form->some_info;
            $userInfo->save();
            $identity = User::findOne($userInfo->userid);
             //测试用，实际情况中不存在管理注册
            $auth = \Yii::$app->authManager;
            $userRole = $auth->getRole('manager_user');
            $auth->assign($userRole, $userInfo->userid);
            Yii::$app->user->login($identity, 0);
            return $this->redirect(['special-personal-center', 'id' => $userInfo->userid]);
        } else {
            return $this->render('special_signup', [
                'model' => $form,
            ]);
        }
    }
    

    /**
     * Updates an existing YiiUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing YiiUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the YiiUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YiiUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
