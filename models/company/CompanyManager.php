<?php

namespace app\models\company;
use app\models\index\ManagerType;
use yii\helpers\Url;
use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "yii_company_manager".
 *
 * @property integer $company_id
 * @property string $manager_type_id
 * @property integer $manager_sex
 * @property integer $manager_idnumber
 * @property integer $manager_mobilephone
 * @property integer $manager_telephone
 * @property integer $manager_fax
 * @property string $manager_email
 * @property string $manager_address
 * @property string $manager_zip_code
 * @property string $manager_comment
 * @property string $manager_name
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
            [['company_id', 'manager_idnumber', 'manager_mobilephone', 'manager_telephone', 'manager_fax'], 'integer'],
            [['manager_email', 'manager_name'], 'string', 'max' => 20],
            [['manager_sex'], 'string'],
            [['manager_address'], 'string', 'max' => 50],
            [['manager_zip_code'], 'string', 'max' => 10],
            [['manager_comment'], 'string', 'max' => 200],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
            [['manager_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ManagerType::className(), 'targetAttribute' => ['manager_type_id' => 'type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => '企业编号',
            'manager_type_id' => '负责人类型',
            'manager_sex' => '负责人性别',
            'manager_idnumber' => '身份证号码',
            'manager_mobilephone' => '联系手机',
            'manager_telephone' => '联系电话',
            'manager_fax' => '联系传真',
            'manager_email' => '联系邮箱',
            'manager_address' => '联系地址',
            'manager_zip_code' => '联系邮编',
            'manager_comment' => '备注信息',
            'manager_name' => '姓名',
            'managerLink' => '姓名',
            'updateManagerLink' => '操作'
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
    public function getManagerType()
    {
        return $this->hasOne(ManagerType::className(), ['type_id' => 'manager_type_id']);
    }
    
    /*
     * 得到点击负责人名字的详情链接
     */
    public function getManagerLink()
    {
        $url = Url::to(['/company/manager-detail' , 'typeid' => $this->manager_type_id]);
        $option = [];
        return Html::a($this->manager_name, $url, $option);
    }
    
}
