<?php

namespace app\models\user;

use Yii;

/**
 * This is the model class for table "yii_admin_user_details".
 *
 * @property integer $user_id
 * @property string $user_nickname
 * @property string $user_sex
 * @property string $user_phone_number
 * @property string $user_email
 * @property string $user_birthday
 * @property string $user_id_number
 * @property string $user_address
 * @property string $user_zip_code
 * @property string $user_legal_person
 * @property string $user_comment
 * @property string $user_type
 * @property integer $region_id
 *
 * @property AdministrativeRegion $region
 * @property YiiUser $user
 */
class AdminUserDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_admin_user_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_nickname', 'user_sex', 'user_birthday', 'user_id_number', 'user_address', 'user_type', 'region_id'], 'required'],
            [['user_id', 'region_id'], 'integer'],
            [['user_nickname', 'user_phone_number', 'user_legal_person', 'user_type'], 'string', 'max' => 20],
            [['user_sex', 'user_zip_code'], 'string', 'max' => 10],
            [['user_email'], 'string', 'max' => 50],
            [['user_birthday', 'user_comment'], 'string', 'max' => 200],
            [['user_id_number'], 'string', 'max' => 18],
            [['user_address'], 'string', 'max' => 100],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdministrativeRegion::className(), 'targetAttribute' => ['region_id' => 'region_id']],
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
            'user_birthday' => '用户生日',
            'user_id_number' => '身份证号',
            'user_address' => '单位地址',
            'user_zip_code' => '单位邮编',
            'user_legal_person' => '单位法人',
            'user_comment' => '备注信息',
            'user_type' => '用户类型',
            'region_id' => '行政代码',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(AdministrativeRegion::className(), ['region_id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
