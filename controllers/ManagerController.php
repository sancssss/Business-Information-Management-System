<?php

namespace app\controllers;
use yii\filters\AccessControl;
use app\models\User;
use Yii;

class ManagerController extends \yii\web\Controller
{
     
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'admin'],
                //非登陆用户无法进入个人中心
                'rules' => [
                     [
                        'allow' => 'true',
                        'actions' => ['index'],
                        'roles' => ['manager_user','nochecked_manager_user'],
                    ],
                ]
            ],
        ];
    }
    /**
     * 显示管理员的用户中心,管理员的个人信息.
     * @return mixed
     */
    public function actionIndex()
    {
         return $this->render('special_personal_center', [
            'model' => $this->findModel(Yii::$app->user->getId()),
        ]);
    }
    /**
     * 显示用户列表.
     * @return mixed
     */
    public function actionUserList()
    {
        
    }
    /**
     * 确认某个用户为认证用户.
     * @return boolean 
     */
    public function confirmUser($uid)
    {
        
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
            throw new NotFoundHttpException('请求错误');
        }
    }

}
