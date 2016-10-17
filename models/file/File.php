<?php

namespace app\models\file;

use Yii;

/**
 * This is the model class for table "yii_file".
 *
 * @property integer $file_id
 * @property string $file_name
 * @property string $file_extension
 * @property string $file_path
 * @property string $file_comment
 *
 * @property YiiImageFile[] $yiiImageFiles
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_id'], 'required'],
            [['file_id'], 'integer'],
            [['file_name', 'file_path'], 'string', 'max' => 50],
            [['file_extension'], 'string', 'max' => 10],
            [['file_comment'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'file_name' => 'File Name',
            'file_extension' => 'File Extension',
            'file_path' => 'File Path',
            'file_comment' => 'File Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageFiles()
    {
        return $this->hasMany(ImageFile::className(), ['file_id' => 'file_id']);
    }
}
