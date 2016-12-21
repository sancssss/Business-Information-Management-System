<?php

namespace app\models\index;

use Yii;
use app\models\file\ImageFile;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * This is the model class for table "yii_image_type".
 *
 * @property integer $type_id
 * @property string $type_name
 *
 * @property YiiImageFile[] $yiiImageFiles
 */
class ImageType extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_image_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => '类型',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageFiles()
    {
        return $this->hasMany(ImageFile::className(), ['image_typeid' => 'type_id']);
    }
    
    public function getImageFile()
    {
        return $this->hasOne(ImageFile::className(), ['image_typeid' => 'type_id']);
    }
    
  
}
