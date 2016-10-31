<?php

namespace app\models\user;

use Yii;
use app\models\company\Company;

/**
 * This is the model class for table "yii_company_user_details".
 *
 * @property integer $user_id
 * @property string $user_nickname
 * @property string $user_sex
 * @property string $user_phone_number
 * @property string $user_email
 * @property string $user_comment
 *
 * @property YiiUser $user
 */
class CompanyUserDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_company_user_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_nickname'], 'required'],
            [['user_id'], 'integer'],
            [['user_nickname'], 'string', 'max' => 20],
            [['user_phone_number'], 'number'],
            [['user_sex'], 'string', 'max' => 10],
            [['user_email'], 'string', 'max' => 50],
            [['user_comment'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_nickname' => '用户姓名',
            'user_sex' => '用户性别',
            'user_phone_number' => '手机号码',
            'user_email' => '用户邮箱',
            'user_comment' => '备注信息',
        ];
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
