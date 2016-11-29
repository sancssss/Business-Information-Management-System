<?php

namespace app\controllers;

use Yii;
use app\models\file\FileUploadForm;
use app\models\index\ImageType;
use app\models\company\Company;
use app\models\company\CompanyImagetype;
use app\models\file\ImageFile;
use app\models\file\File;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class CompanyPictureController extends \yii\web\Controller
{
    /*
     * 全部图片类型的概览
     */
    public function actionIndex()
    {
        $query = CompanyImagetype::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /*
     * 图片列表，id为图片类型
     */
    public function actionPicturesList($id)
    {
        $query = $this->findPictureModel($id);
        $ImageType = ImageType::find()->where(['type_id' => $id])->one();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
         return $this->render('images-list', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ImageType' => $ImageType,
        ]);
    }
    
    /*
     * 为类型号为id的类型上传图片
     * @param integer $id
     */
    public function actionUploadPicture($typeid)
    {
        $fileModel = new FileUploadForm();
        $type = ImageType::find()->where(['type_id' => $typeid])->one();
        if(Yii::$app->request->isPost){
            $fileModel->mutiFiles = UploadedFile::getInstances($fileModel, 'mutiFiles');
            //upload方法内验证
            if($fileModel->upload($typeid, $this->getCompanyId())){
                Yii::$app->session->setFlash('success', '文件上传成功！');
            }
        }
        return $this->render('upload-picture', [
            'model' => $fileModel,
            'type' => $type,
        ]);
    }
    
    public function actionDeletePicture($id)
    {
        //imageFile表通过外键级联删除
        $file = File::find()->where(['file_id' => $id])->one();
        $typeid = $file->ImageFile->image_typeid;
        if($file->delete()){
            Yii::$app->session->setFlash('success', '文件删除成功！');
        }
        return $this->redirect(['/company-picture/pictures-list', 'id' => $typeid]);
    }


    /*
     * 查找当前公司的某类型图片资源
     */
    protected function findPictureModel($type)
    {
        $imageFile = ImageFile::find()->where(['company_id' => $this->getCompanyId(), 'image_typeid' => $type]);
        return $imageFile;
    }
    
    protected function getCompanyId()
    {
         $id = Company::find()->where(['user_id' => Yii::$app->user->getId()])->one()->company_id;
         return $id;
    }
}