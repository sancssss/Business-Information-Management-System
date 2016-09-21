<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_identity".
 *
 * @property integer $identity_id
 * @property string $identity_name
 *
 * @property YiiUser[] $yiiUsers
 */
class YiiIdentity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_identity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identity_id', 'identity_name'], 'required'],
            [['identity_id'], 'integer'],
            [['identity_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'identity_id' => 'Identity ID',
            'identity_name' => 'Identity Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYiiUsers()
    {
        return $this->hasMany(YiiUser::className(), ['user_identityid' => 'identity_id']);
    }
}
