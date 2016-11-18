<?php

namespace app\models\company;
use app\models\user\CompanyUserDetails;
use app\models\file\ImageFile;
use app\models\verified\VerifiedCompany;
use app\models\index\AdministrativeRegion;

use Yii;

/**
 * This is the model class for table "yii_company".
 *
 * @property integer $company_id
 * @property integer $user_id
 * @property string $company_name
 * @property string $company_credit_code
 * @property string $company_charater
 * @property string $company_registered_capital
 * @property string $company_established_time
 * @property integer $company_region_id
 * @property string $company_re_province
 * @property string $company_reg_city
 * @property string $company_reg_county
 * @property string $company_reg_address
 * @property string $company_reg_longitude
 * @property string $company_reg_latitude
 * @property string $company_prod_province
 * @property string $company_prod_city
 * @property string $company_prod_county
 * @property string $company_prod_address
 * @property string $company_prod_longitude
 * @property string $company_prod_latitude
 * @property integer $company_doctor_num
 * @property integer $company_master_num
 * @property integer $company_bachelor_num
 * @property integer $company_juniorcollege_num
 * @property integer $company_staff_num
 * @property integer $verified
 * @property string $company_comment
 *
 * @property YiiCompanyUserDetails $companyRegion
 * @property AdministrativeRegion $companyRegion0
 * @property YiiCompanyManager $yiiCompanyManager
 * @property YiiImageFile $yiiImageFile
 * @property YiiVerifiedCompany[] $yiiVerifiedCompanies
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'company_name'], 'required'],
            [[ 'user_id', 'company_region_id', 'company_doctor_num', 'company_master_num', 'company_bachelor_num', 'company_juniorcollege_num', 'company_staff_num', 'verified'], 'integer'],
            [['company_reg_longitude', 'company_reg_latitude', 'company_prod_longitude', 'company_prod_latitude'], 'number'],
            [['company_name', 'company_reg_address', 'company_prod_address'], 'string', 'max' => 50],
            [['company_credit_code', 'company_charater', 'company_registered_capital', 'company_established_time', 'company_re_province', 'company_reg_city', 'company_reg_county', 'company_prod_province', 'company_prod_city', 'company_prod_county'], 'string', 'max' => 20],
            [['company_comment'], 'string', 'max' => 200],
            [['company_region_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdministrativeRegion::className(), 'targetAttribute' => ['company_region_id' => 'region_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => '企业编号',
            'user_id' => '用户编号',
            'company_name' => '企业名称',
            'company_credit_code' => '社会信用代码',
            'company_charater' => '注册性质',
            'company_registered_capital' => '注册资本',
            'company_established_time' => '成立时间',
            'company_region_id' => '行政代码',
            'company_re_province' => '注册省市',
            'company_reg_city' => '注册地市',
            'company_reg_county' => '注册县市',
            'company_reg_address' => '注册地址',
            'company_reg_longitude' => '注册经度',
            'company_reg_latitude' => '注册纬度',
            'company_prod_province' => '生产省市',
            'company_prod_city' => '生产地市',
            'company_prod_county' => '生产县市',
            'company_prod_address' => '生产地址',
            'company_prod_longitude' => '生产经度',
            'company_prod_latitude' => '生产纬度',
            'company_doctor_num' => '博士学历人数',
            'company_master_num' => '硕士学历人数',
            'company_bachelor_num' => '本科学历人数',
            'company_juniorcollege_num' => '大专学历人数',
            'company_staff_num' => '职工学历人数',
            'verified' => '审核状态',
            'company_comment' => '备注信息',
            'verifyStatus' => '审核状态'
        ];
    }
    
    
    public function getVerifyStatus()
    {
        $verifyStatus = '<span class="not-set">未审核</span>';
        if($this->verified == 1){
            $verifyStatus = '已审核';
        }
        return $verifyStatus;
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyRegion()
    {
        return $this->hasOne(AdministrativeRegion::className(), ['region_id' => 'company_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(CompanyUserDetails::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyManagers()
    {
        return $this->hasMany(CompanyManager::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageFile()
    {
        return $this->hasOne(ImageFile::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerifiedCompanies()
    {
        return $this->hasMany(VerifiedCompany::className(), ['company_id' => 'company_id']);
    }
    
}
