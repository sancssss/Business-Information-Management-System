<?php

namespace app\models\verified;

use Yii;
use app\models\user\User;

/**
 * This is the model class for table "yii_verified_manager".
 *
 * @property integer $id
 * @property integer $admin_user_id
 * @property integer $verified_user_id
 * @property integer $verified_status
 * @property integer $verified_time
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
            [['admin_user_id', 'verified_user_id', 'verified_status', 'verified_time'], 'required'],
            [['admin_user_id', 'verified_user_id', 'verified_status', 'verified_time'], 'integer'],
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
            'id' => 'id',
            'admin_user_id' => '用户id',
            'verified_user_id' => '审核者',
            'verified_status' => '审核状态',
            'verified_time' => '审核时间',
            'verified_information' => '审核信息',
            'verified_comment' => '审核备注',
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
