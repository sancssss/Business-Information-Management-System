<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_user".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_password
 * @property integer $user_identityid
 *
 * @property YiiIdentity $userIdentity
 * @property YiiUser1Details[] $yiiUser1Details
 * @property YiiUser2Details[] $yiiUser2Details
 */
class YiiUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user';
    }
    
    public function scenarios() {
        return [
          'login' => ['user_name','user_password'],
          'signup' => ['user_name','user_password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'user_password', 'user_identityid'], 'required'],
            [['user_identityid'], 'integer'],
            [['user_name'], 'string', 'max' => 255],
            [['user_password'], 'string', 'max' => 32],
            [['user_identityid'], 'exist', 'skipOnError' => true, 'targetClass' => YiiIdentity::className(), 'targetAttribute' => ['user_identityid' => 'identity_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => '用户名',
            'user_password' => '密码',
            'user_identityid' => 'User Identityid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdentity()
    {
        return $this->hasOne(YiiIdentity::className(), ['identity_id' => 'user_identityid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYiiUser1Details()
    {
        return $this->hasMany(YiiUser1Details::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYiiUser2Details()
    {
        return $this->hasMany(YiiUser2Details::className(), ['userid' => 'user_id']);
    }
}
