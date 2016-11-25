<?php

namespace app\controllers;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\user\User;
use app\models\user\AdminUserDetails;
use Yii;

class CityAdminController extends \yii\web\Controller
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
                'only' => ['index'],
                'rules' => [
                     [
                        'allow' => 'true',
                        'actions' => ['index'],
                        'roles' => ['notcheck_city_admin','city_admin'],
                    ],
                ]
            ],
        ];
    }
    
    /*
     * 显示县级负责人的个人信息
     */
    public function actionIndex()
    {
        $model = $this->findModel(Yii::$app->user->getId());
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    
    //TODO::应该使用场景模式scenrio
    public function actionUpdateUser()
    {
        $detailModel = AdminUserDetails::find()->where(['user_id' => Yii::$app->user->getId()])->one();
        $userModel = $this->findModel(Yii::$app->user->getId());
        //$tempPassword = $userModel->user_password;
        $userModel->user_password = "";
        if($userModel->load(Yii::$app->request->post()) && $detailModel->load(Yii::$app->request->post())){
            $isVaild = $userModel->validate();
            $isVaild = $isVaild && $detailModel->validate();
            if($isVaild){
                $userModel->user_password = md5($userModel->user_password);
                $userModel->identity_id = 6;
                $detailModel->save();
                $userModel->save();
                $auth = Yii::$app->authManager;
                $auth->revokeAll(Yii::$app->user->getId());//删除全部角色
                $userRole = $auth->getRole('notcheck_city_admin');
                $auth->assign($userRole, Yii::$app->user->getId());
                return $this->redirect(['index']);
            }
        }
        return $this->render('update-user', [   
            'userModel' => $userModel,
            'detailModel' => $detailModel,
        ]);
    }

    
    
    
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
