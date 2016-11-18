<?php

namespace app\models\index;

use Yii;

/**
 * This is the model class for table "yii_manager_type".
 *
 * @property integer $type_id
 * @property string $type_name
 *
 * @property YiiCompanyManager[] $yiiCompanyManagers
 */
class ManagerType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_manager_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'type_name'], 'required'],
            [['type_id'], 'integer'],
            [['type_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => '负责人类型',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyManagers()
    {
        return $this->hasMany(CompanyManager::className(), ['manager_type_id' => 'type_id']);
    }
}
