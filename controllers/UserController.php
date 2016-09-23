<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\User1Details;
use app\models\SignupForm;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * YiiUserController implements the CRUD actions for YiiUser model.
 */
class UserController extends Controller
{
    public $tempModel;
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
            $user->user_password = $form->user_password;
            $user->user_identityid = 1;
            $user->save();
            $userInfo->user_id = $user->user_id;
            $userInfo->some_info = $form->some_info;
            $userInfo->save();
            return $this->redirect(['personal-center', 'id' => $userInfo->user_id]);
        } else {
            return $this->render('signup', [
                'model' => $form,
            ]);
        }
    }
    
    public function addUser($userId){
        $user = User::findOne($userId);
        $userInfo = User1Details::findOne(userId);
        
        if(!isset($user, $userInfo)){
            throw new NotFoundHttpException("The user was not found.");
        }
        
        if ($user->load(Yii::$app->request->post()) && $userInfo->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
                return $this->redirect(['view', 'id' => $userId]);
            }
        }
        
        return $this->render('signup', [
            'user' => $user,
            'userInfo' => $profile,
        ]);
    }
    /**
     * Creates a new SpecialYiiUser model
     * If creation is successful, the browser will be redirected to the 'special_personal_center' page.
     * @return mixed
     */
    public function actionSpecialSignup(){
        
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