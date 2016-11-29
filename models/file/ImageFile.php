<?php

namespace app\models\file;

use Yii;
use app\models\company\Company;
use app\models\file\File;
use app\models\index\ImageType;

/**
 * This is the model class for table "yii_image_file".
 *
 * @property integer $company_id
 * @property string $image_type
 * @property integer $display_order
 * @property integer $file_id
 * @property string $image_comment
 *
 * @property YiiCompany $company
 * @property YiiFile $file
 */
class ImageFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_image_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_comment'], 'string', 'max' => 200],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['file_id' => 'file_id']],
            [['image_typeid'], 'exist', 'skipOnError' => true, 'targetClass' => ImageType::className(), 'targetAttribute' => ['image_typeid' => 'type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'image_typeid' => 'Image Type',
            'display_order' => 'Display Order',
            'file_id' => 'File ID',
            'image_comment' => 'Image Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::className(), ['file_id' => 'file_id']);
    }
    
    public function getFileUrlName()
    {
        $url = $this->getFile()->one();
        $result = $url->file_hash.".".$url->file_extension;
        return $result;
    }
}
