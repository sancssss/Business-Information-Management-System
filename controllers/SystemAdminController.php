<?php

namespace app\controllers;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\user\User;
use app\models\user\AdminUserDetails;
use app\models\user\admin\AdminUser;
use yii\data\ActiveDataProvider;
use Yii;

class SystemAdminController extends \yii\web\Controller
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
                        'roles' => ['system_admin'],
                    ],
                ]
            ],
        ];
    }
    
    /*
     * 显示超级管理员的个人信息
     */
    public function actionIndex()
    {
        $model = $this->findModel();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    
    //TODO::应该使用场景模式scenrio
    //只有改密码功能
    public function actionUpdateUser()
    {
        $userModel = $this->findModel();
        //$tempPassword = $userModel->user_password;
        $userModel->user_password = "";
        if($userModel->load(Yii::$app->request->post()) && $userModel->validate()){
                $userModel->user_password = md5($userModel->user_password);
                $userModel->save();
                return $this->redirect(['index']);
        }
        return $this->render('update-user', [   
            'userModel' => $userModel,
        ]);
    }
    //TODO:不知道省级管理员是否需要详细资料
    /*
     * 增加一个省级管理员
     */
    public function actionAddPadmin()
    {
        $model = new User();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->render(['province-admin-list']);
        }
        return $this->render('add-padmin', [
            'model' => $model,
        ]);
    }
    
    
    
    /**
     * 删除一个省级管理员
     */
    public function actionDelPadmin($id)
    {
        $model = User::find()->where(['user_id' => $id])->one();
        $model->delete();
        return $this->redirect(['/system-admin/admin-list']);
    }
    
    /*
     * 管理员列表
     */
    public function actionAdminList()
    {
        $query = AdminUser::find()->where(['user_identityid' => User::PROVINCE_ADMIN]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('admin-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    //指定1000是超级管理员
    protected function findModel()
    {
        if (($model = User::findOne(1000)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
