<?php

namespace app\controllers;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\user\User;
use app\models\user\admin\AdminUser;
use app\models\company\ManagementCompany;
use app\models\user\AdminUserDetails;
use app\models\verified\VerifiedCompany;
use app\models\verified\VerifiedManager;
use yii\data\ActiveDataProvider;
use app\models\company\admin\AdminCompanyImageType;
use app\models\index\ImageType;
use app\models\file\ImageFile;
use app\models\company\admin\AdminCompanyManagerType;
use Yii;

class ProvinceAdminController extends \yii\web\Controller
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
                'only' => ['index', 'update-user', 'company-waitting-list', 'confirm-company', 'company-lists', 'company-detail', 'county-waitting-list', 'city-waitting-list', 'admin-list', 'admin-details', 'confirm-admin', 'admin-log', 'company-log', 'company-list'],
                'rules' => [
                     [
                        'allow' => 'true',
                        'actions' => ['company-waitting-list', 'confirm-company', 'company-lists', 'company-detail', 'county-waitting-list', 'city-waitting-list', 'admin-list', 'admin-details', 'confirm-admin', 'admin-log', 'company-log', 'company-list'],
                        'roles' => ['province_admin','system_admin'],
                    ],
                    [
                        'allow' => 'true',
                        'actions' => ['index', 'update-user'],
                        'roles' => ['province_admin'],
                    ]
                ]
            ],
        ];
    }
    
    /*
     * 显示个人信息
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
                return $this->redirect(['index']);
            }
        }
        return $this->render('update-user', [   
            'userModel' => $userModel,
            'detailModel' => $detailModel,
        ]);
    }
    
    /*
     * 待审核公司列表
     */
    public function actionCompanyWaittingList()
    {
        $selectionData = Yii::$app->request->post('selection');
        if($selectionData != NULL)
        {
            for($i = 0; $i < sizeof($selectionData); $i++){
                $this->verifiedCompany($selectionData[$i], Yii::$app->user->getId());
            }
        }
        $query = ManagementCompany::find()->where(['verified' => 0]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('company-waitting-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /*
     * 审核单个公司
     */
    public function actionConfirmCompany($id)
    {
        $this->verifiedCompany($id, Yii::$app->user->getId());
        return $this->redirect(['province-admin/company-list']);
    }
    
    public function verifiedCompany($id, $confirmUserId)
    {
        $model = ManagementCompany::findOne($id);
        $model->confirmSelf($confirmUserId);
        $model->save();
    }

    /*
     * 公司列表
     */
    public function actionCompanyList()
    {
        $query = ManagementCompany::find()->where(['verified' => 1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('company-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /*
     * 公司资料详情
     * 公司id $id
     */
    public function actionCompanyDetail($id)
    {
        $model = ManagementCompany::find()->where(['company_id' => $id])->one();
         return $this->render('company-details', [
            'model' => $model,
        ]);
    }
    /*
     * 公司附件列表详情
     * 公司id $id
     */
    public function actionCompanyImageTypeList($id)
    {
        $query = AdminCompanyImageType::find()->innerJoinWith('imageFile')->where(['company_id' => $id]);
        $model = $query->one();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('company-image-type-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }
    
    /*
     * 附件列表
     * 公司id $id
     * 图片类型id $typeid
     */
    public function actionCompanyImageList($id,$typeid)
    {
        $query = ImageFile::find()->where(['company_id' => $id, 'image_typeid' => $typeid]);
        $ImageType = ImageType::find()->where(['type_id' => $id])->one();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('company-image-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ImageType' => $ImageType,
            'id' => $id,
        ]);
    }
    
    /*
     * 公司法人列表
     * $id 公司id
     */
    public function actionCompanyManagerList($id)
    {
        $query = AdminCompanyManagerType::find()->innerJoinWith('company')->where(['yii_company.company_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('company-manager-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }
    
    /*
     * 公司法人详情
     * $id 公司id
     * $typeid 类型id
     */
    public function actionCompanyManagerDetail($id, $typeid)
    {
        $model = AdminCompanyManagerType::find()->innerJoinWith('company')->where(['yii_company.company_id' => $id, 'manager_type_id' => $typeid])->one();
        return $this->render('company-manager', [
            'model' => $model,
            'id' => $id,
        ]);
    }
    
    
    /*
     * 公司审核记录
     */ 
    public function actionCompanyLog()
    {
        $query = VerifiedCompany::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('company-log', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /*
     * 待审核县级管理员列表
     */
    public function actionCountyWaittingList()
    {
        $selectionData = Yii::$app->request->post('selection');
        if($selectionData != NULL)
        {
            for($i = 0; $i < sizeof($selectionData); $i++){
                $this->verifiedAdmin($selectionData[$i], Yii::$app->user->getId());
            }
        }
        $query = AdminUser::find()->where(['user_identityid' => User::NOTCHECK_COUNTY_ADMIN]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('county-waitting-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /*
     * 待审核市级管理员列表
     */
    public function actionCityWaittingList()
    {
        $selectionData = Yii::$app->request->post('selection');
        if($selectionData != NULL)
        {
            for($i = 0; $i < sizeof($selectionData); $i++){
                $this->verifiedAdmin($selectionData[$i], Yii::$app->user->getId());
            }
        }
        $query = AdminUser::find()->where(['user_identityid' => User::NOTCHECK_CITY_ADMIN]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('city-waitting-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /*
     * 管理列表
     */
    public function actionAdminList()
    {
        $query = AdminUser::find()->where(['user_identityid' => [User::CITY_ADMIN, User::COUNTY_ADMIN]]);
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
     * 管理员详情
     */
    public function actionAdminDetails($id)
    {
        $model = AdminUser::find()->where(['user_id' => $id])->one();
         return $this->render('admin-user-details', [
            'model' => $model,
        ]);
    }
    
    /*
     * 审核单个管理
     */
    public function actionConfirmAdmin($id)
    {
        $this->verifiedAdmin($id, Yii::$app->user->getId());
        return $this->redirect(['province-admin/company-list']);
    }
    
    /*
     * 管理审核记录
     */
    public function actionAdminLog()
    {
        $query = VerifiedManager::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('admin-log', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /*
     * 审核操作
     */
    protected function verifiedAdmin($id, $confirmUserId)
    {
        $model = AdminUser::findOne($id);
        $model->confirmSelf($confirmUserId);
        $model->save();
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
