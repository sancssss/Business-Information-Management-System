<?php

namespace app\models\company;

use Yii;

/**
 * This is the model class for table "yii_company_manager".
 *
 * @property integer $company_id
 * @property string $manager_type
 * @property integer $manager_sex
 * @property integer $manager_idnumber
 * @property integer $manager_mobilephone
 * @property integer $manager_telephone
 * @property integer $manager_fax
 * @property string $manager_email
 * @property string $manager_address
 * @property string $manager_zip_code
 * @property string $manager_comment
 *
 * @property YiiCompany $company
 */
class CompanyManager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_company_manager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id'], 'required'],
            [['company_id', 'manager_sex', 'manager_idnumber', 'manager_mobilephone', 'manager_telephone', 'manager_fax'], 'integer'],
            [['manager_type', 'manager_email'], 'string', 'max' => 20],
            [['manager_address'], 'string', 'max' => 50],
            [['manager_zip_code'], 'string', 'max' => 10],
            [['manager_comment'], 'string', 'max' => 200],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => '企业编号',
            'manager_type' => '负责人类型',
            'manager_sex' => '负责人性别',
            'manager_idnumber' => '身份证号码',
            'manager_mobilephone' => '联系手机',
            'manager_telephone' => '联系电话',
            'manager_fax' => '联系传真',
            'manager_email' => '联系邮箱',
            'manager_address' => '联系地址',
            'manager_zip_code' => '联系邮编',
            'manager_comment' => '备注信息',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }
}
