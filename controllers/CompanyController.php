<?php

namespace app\controllers;
use app\models\company\Company;
use yii\web\NotFoundHttpException;
use app\models\company\CompanyManager;
use Yii;

class CompanyController extends \yii\web\Controller
{
    /*
     * 管理公司的主界面
     */
    public function actionIndex()
    {
        $model = $this->findCompanyModel();
        return $this->render('index',[
            'model' => $model,
        ]);
    }
    
    /**
     * 负责人管理主界面
     * 第一次时创建/查看/更新/负责人信息
     */
    public function actionCompanyManager()
    {
        $model = $this->findCManagerModel();
        if($model == null){
            $this->redirect(['createManager']);
        }else{
            return $this->render('company-manager', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * 在没有负责人存在的情况创建一个管理
     */
    public function actionCreateManager()
    {
        $model = new CompanyManager();
        $form = new CompanyManagerForm();
        //if($model->load(Yii::$app->request->post()))
    }
    
    /**
     * 更新负责人信息页面,更新完成自动跳转回首页详情
     */
    public function actionUpdateManager()
    {
        
    }
    
    
    /**
     * 找到当前用户的公司Model并且返回
     * @return Company model
     * @throws NotFoundHttpException
     */
    protected function findCompanyModel()
    {
        if (($model = Company::find()->where(['user_id' => Yii::$app->user->getId(), 'verified' => 1])->one()) != null) {
            return $model;
        } else {
            throw new NotFoundHttpException('您的公司还在审核中,请耐心等待!',909);
        }
    }
    
    protected function findCManagerModel()
    {
        $model = CompanyManager::find()->innerJoinWith('company')->where(['user_id' => Yii::$app->user->getId()])->one();
        return $model;
    }

}
