<?php

namespace app\controllers;
use yii\filters\AccessControl;
use app\models\company\Company;
use yii\web\NotFoundHttpException;
use app\models\company\CompanyManager;
use app\models\index\ManagerType;
use app\models\index\AdministrativeRegion;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use Yii;

class CompanyController extends \yii\web\Controller
{
    
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create-company', 'update-company', 'manager-detail', 'create-manager', 'managers-list', 'add-manager', 'update-manager', ],
                'rules' => [
                     [
                        'allow' => 'true',
                        'actions' => ['index', 'create-company', 'update-company', 'manager-detail', 'create-manager', 'managers-list', 'add-manager', 'update-manager',],
                        'roles' => ['company'],
                    ],
                ]
            ],
        ];
    }
    
    /*
     * 管理公司的主界面
     */
    public function actionIndex()
    {
        if(($model = $this->findCompanyModel()) == NULL){
            return $this->redirect(['createCompany']);
        }
        return $this->render('index',[
            'model' => $model,
        ]);
    }

    
    /*
     * 第一次创建一个新公司
     */
    public function actionCreateCompany()
    {
        $model = $this->findCompanyModel();
        //公司存在直接返回index
        if($model != NULL){
            return $this->redirect(['/company/index']);
        }
        $regions = AdministrativeRegion::find()->all();
        $regionList = ArrayHelper::map($regions, 'region_id', 'region_name');
        $model = new Company();
        if($model->load(Yii::$app->request->post())){
            $model->verified = 0;
            $model->user_id = Yii::$app->user->getId();
            if($model->save()){
                return $this->redirect(['/company/index']);
            }
            Yii::$app->session->setFlash('error', "创建失败！");
            
        }
        return $this->render('create-company', [
            'model' => $model,
            'regionList' => $regionList
        ]);
    }
    
     /*
     * 更新公司资料
     */
    public function actionUpdateCompany()
    {
        
        $model = $this->findCompanyModel();
        if($model == NULL){
            return $this->redirect(['/company/create-company']);
        }
        //为审核的公司无法更新字资料
        if($model->verified == 0){
            return $this->redirect(['/company-user/my-company']);
        }
        $regions = AdministrativeRegion::find()->all();
        $regionList = ArrayHelper::map($regions, 'region_id', 'region_name');
        if($model->load(Yii::$app->request->post())){
            $model->verified = 0;
            $model->user_id = Yii::$app->user->getId();
            if($model->save()){
                Yii::$app->session->setFlash('success', "资料更新成功！");
                //更新成功返回首页
                return $this->redirect(['/company/index']);
            }
            Yii::$app->session->setFlash('error', "创建失败！");
        }
        return $this->render('update-company', [
            'model' => $model,
            'regionList' => $regionList
        ]);
    }

    
    /**
     * 负责人管理主界面
     * 第一次时创建/查看/更新/负责人信息
     */
    public function actionManagerDetail($typeid)
    {
        $model = $this->findCManagersModel()->where(['manager_type_id' => $typeid])->one();
        if($model == null){
            $this->redirect(['manager-list']);
        }else{
            return $this->render('manager-detail', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * 在没有负责人存在的情况创建一个管理
     */
    public function actionCreateManager()
    {
        if($this->findCManagerModel() != null){
            return $this->redirect (['company-manager']);
        }          
        $model = new CompanyManager();
        $model->company_id = $this->findCompanyModel()->company_id;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->save();
            return $this->redirect(['company-manager']);
        }else{
            //return print_r ($model->getErrors());
            return $this->render('create-manager',[
               'model' => $model, 
            ]);
        }
    }
    
    /**
     * 负责人列表
     */
    public function actionManagersList()
    {
        if(($this->findCompanyModel() == NULL) || ($this->findCompanyModel()->verified == 0)){
            return $this->redirect(['/company/index']);
        }
        $query = $this->findCManagersModel();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('managers-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
     /*
     * 增加一个负责人
     */
    public function actionAddManager()
    {
        $type = ManagerType::find()->all();
        $allType = ArrayHelper::map($type, 'type_id', 'type_name');
        $model = new CompanyManager();
        $model->company_id = Company::find()->where(['user_id' => Yii::$app->user->getId()])->one()->company_id;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            //$model->manager_type_id = Yii::$app->request->post('manager_type_id');
            $checkModel = $this->findCManagersModel()->andWhere(['manager_type_id' => $model->manager_type_id])->one();
            //判断是否重复添加
            if($checkModel != NULL){
                Yii::$app->session->setFlash('error', "已经存在该类型！");
                return $this->redirect(['managers-list']);
            }
            if($model->save()){
                return $this->redirect(['managers-list']);
            }          
        }
        //return print_r($model->getErrors());
        return $this->render('add-manager', [
            'model' => $model,
            'allType' => $allType,
        ]);
    }
    
    
    /*
     * 更新一个typeid为$id的负责人
     */
    public function actionUpdateManager($id)
    {
        $type = ManagerType::find()->all();
        $allType = ArrayHelper::map($type, 'type_id', 'type_name');
        
        $managerType = ManagerType::find($id);
        //判断是否存在类型
        if($managerType == NULL){
            return $this->redirect(['managers-list']);
        }
        $checkModel = $this->findCManagersModel()->andWhere(['manager_type_id' => $id])->one();
        //判断是否没有创建
        if($checkModel == NULL){
            return $this->redirect(['managers-list']);
        }
        $model = $this->findCManagersModel()->andWhere(['manager_type_id' => $id])->one();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->save()){
                return $this->redirect(['managers-list']);
            }          
        }
        return $this->render('update-manager', [
            'model' => $model,
            'allType' => $allType,
        ]);
    }
    
    
    
    /**
     * 找到当前用户的公司Model（已审核）并且返回
     * @return Company model
     * @throws NotFoundHttpException
     */
    protected function findCompanyModel()
    {
        $model = Company::find()->where(['user_id' => Yii::$app->user->getId()])->one();
        return $model;
    }
    
    /**
     * 返回多个负责人
     */
    protected function findCManagersModel()
    {
        $model = CompanyManager::find()->innerJoinWith('company')->where(['user_id' => Yii::$app->user->getId()]);
        return $model;
    }

}
