<?php

namespace app\models\verified;

use Yii;

/**
 * This is the model class for table "yii_verified_company".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $verified_user_id
 * @property integer $verified_status
 * @property integer $verified_time
 * @property string $verified_information
 * @property string $verified_comment
 *
 * @property YiiCompany $company
 * @property YiiUser $verifiedUser
 */
class VerifiedCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_verified_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'verified_user_id', 'verified_status'], 'required'],
            [['company_id', 'verified_user_id', 'verified_status', 'verified_time'], 'integer'],
            [['verified_information', 'verified_comment'], 'string', 'max' => 200],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
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
            'company_id' => 'Company ID',
            'verified_user_id' => 'Verified User ID',
            'verified_status' => 'Verified Status',
            'verified_time' => 'Verified Time',
            'verified_information' => 'Verified Information',
            'verified_comment' => 'Verified Comment',
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
    public function getVerifiedUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'verified_user_id']);
    }
}
