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
 * @property string $some_info
 *
 * @property YiiIdentity $userIdentity
 * @property YiiUser1Detail $yiiUser1Details
 * @property YiiUser2Detail $yiiUser2Details
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user';
    }
    
    public function scenarios() {
        return parent::scenarios();
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
            'user_id' => '用户ID',
            'user_name' => '用户名',
            'user_password' => '密码',
            'user_identityid' => '用户身份',
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
    public function getUser1Detail()
    {
        return $this->hasOne(User1Details::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser2Detail()
    {
        return $this->hasOne(User2Details::className(), ['userid' => 'user_id']);
    }
}
