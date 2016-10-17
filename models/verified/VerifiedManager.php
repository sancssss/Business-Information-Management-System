<?php

namespace app\models\verified;

use Yii;

/**
 * This is the model class for table "yii_verified_manager".
 *
 * @property integer $id
 * @property integer $admin_user_id
 * @property integer $verified_user_id
 * @property integer $verified_status
 * @property string $verified_information
 * @property string $verified_comment
 *
 * @property YiiUser $adminUser
 * @property YiiUser $verifiedUser
 */
class VerifiedManager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_verified_manager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_user_id', 'verified_user_id', 'verified_status'], 'required'],
            [['admin_user_id', 'verified_user_id', 'verified_status'], 'integer'],
            [['verified_information', 'verified_comment'], 'string', 'max' => 200],
            [['admin_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['admin_user_id' => 'user_id']],
            [['verified_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['verified_user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_user_id' => 'Admin User ID',
            'verified_user_id' => 'Verified User ID',
            'verified_status' => 'Verified Status',
            'verified_information' => 'Verified Information',
            'verified_comment' => 'Verified Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'admin_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerifiedUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'verified_user_id']);
    }
}
