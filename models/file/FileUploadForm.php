<?php

namespace app\models\file;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\file\File;
use app\models\file\ImageFile;
use Yii;

class FileUploadForm extends Model
{
     /**
     * @var UploadedFile[]
     */
    public $mutiFiles;

    public function rules()
    {
        return [
            [['mutiFiles'], 'file', 'skipOnEmpty' => false, 'maxFiles' => 0],
        ];
    }
    
    public function attributeLabels() {
        return [
          'mutiFiles' => '选择文件',
        ];
    }
    /**
     * 上传文件到服务器并且在对应数据表中创建文件索引
     * typeid为类型号,companyid为公司号上传成功返回true
     * @param integer $typeid, $companyid
     * @return boolean 
     */
    public function upload($typeid, $companyid)
    {
        if ($this->validate()) { 
            foreach ($this->mutiFiles as $file) {
                $randomKey = Yii::$app->getSecurity()->generateRandomString(32);
                $file->saveAs(Yii::getAlias('@webroot').'/uploads/' . $randomKey . '.' . $file->extension);
                $myfile = new File();
                $myfile->file_name = $file->baseName;
                $myfile->file_extension = $file->extension;
                $myfile->file_time = time();
                $myfile->file_hash = $randomKey;
                $myfile->save();
                $imageFile = new ImageFile();
                $imageFile->company_id = $companyid;
                $imageFile->image_typeid = $typeid;
                $imageFile->file_id = $myfile->file_id;
                $imageFile->save();
            }
            return true;
        } else {
            return false;
        }
    }

}

?>