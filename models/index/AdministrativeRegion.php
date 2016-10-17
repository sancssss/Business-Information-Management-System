<?php

namespace app\models\index;

use Yii;

/**
 * This is the model class for table "administrative_region".
 *
 * @property integer $id
 * @property integer $region_id
 * @property string $region_name
 * @property string $region_pinyin
 *
 * @property YiiAdminUserDetails[] $yiiAdminUserDetails
 */
class AdministrativeRegion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'administrative_region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'region_name', 'region_pinyin'], 'required'],
            [['id', 'region_id'], 'integer'],
            [['region_name', 'region_pinyin'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '行政区编号',
            'region_id' => '行政代码',
            'region_name' => '行政单位名',
            'region_pinyin' => '行政单位拼音',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminUserDetails()
    {
        return $this->hasMany(AdminUserDetails::className(), ['region_id' => 'region_id']);
    }
}
