<?php

namespace app\controllers;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\user\User;
use app\models\user\admin\AdminUser;
use yii\data\ActiveDataProvider;
use app\models\index\ImageType;
use app\models\index\ManagerType;
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
        $model->user_identityid = User::PROVINCE_ADMIN;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            //设置角色
            $model->user_password = md5(Yii::$app->request->post('user_password'));
            $model->save();
            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole('system_admin');
            $auth->assign($userRole, $model->user_id);
            return $this->redirect(['/system-admin/admin-list']);
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
    
    /*
     * 负责人类型管理
     */
    public function actionCompanyManagerTypeList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ManagerType::find(),
        ]);

        return $this->render('company-manager-type-list', [
            'dataProvider' => $dataProvider,
        ]);
        
    }
    
    public function actionAddCompanyManagerType()
    {
        $model = new ManagerType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['company-manager-type-list']);
        } else {
            return $this->render('add-company-manager-type', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionDeleteCompanyManagerType($id)
    {
        $this->findManagerTypeModel($id)->delete();

        return $this->redirect(['company-manager-type-list']);
    }
    
    public function actionUpdateCompanyManagerType($id)
    {
        $model = $this->findManagerTypeModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['company-manager-type-list']);
        } else {
            return $this->render('update-company-manager-type', [
                'model' => $model,
            ]);
        }

    }
    
    /**
     * 图片类型管理
     */
    public function actionCompanyImageTypeList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ImageType::find(),
        ]);

        return $this->render('company-image-type-list', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionAddCompanyImageType()
    {
        $model = new IMageType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['company-image-type-list']);
        } else {
            return $this->render('add-company-image-type', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionDeleteCompanyImageType($id)
    {
        $this->findImageTypeModel($id)->delete();

        return $this->redirect(['company-image-type-list']);
    }
    
    public function actionUpdateCompanyImageType($id)
    {
        $model = $this->findImageTypeModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['company-image-type-list']);
        } else {
            return $this->render('update-company-image-type', [
                'model' => $model,
            ]);
        }
    }
    
    protected function findIMageTypeModel($id)
    {
        if (($model = ImageType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findManagerTypeModel($id)
    {
        if (($model = ManagerType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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
