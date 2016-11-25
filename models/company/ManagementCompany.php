<?php

namespace app\models\company;
use app\models\company\Company;
use app\models\user\User;
use app\models\verified\VerifiedCompany;
use yii\helpers\Url;
use yii\helpers\Html;

use Yii;


class ManagementCompany extends Company
{
    public function attributeLabels() {
        $lables = [
            'confirmLink' => '审核',
            'detailLink' => '名称'
        ];
        return array_merge($lables, parent::attributeLabels());
    }
    
    public function getdetailLink()
    {
        $url = Url::to(['/province-admin/company-detail', 'id' => $this->company_id]);
        $options =  [];
        return Html::a($this->company_name, $url, $options);
    }
    
    public function getConfirmLink()
    {
        if($this->verified == 1){
             return Html::tag('a','已认证');
        }
        $url = Url::to(['/province-admin/confirm-company', 'id' => $this->company_id]);
        $options =  ['class'=>'label label-primary'];
        return Html::a('确认', $url, $options);
    }
    /*
     * 审核
     */
    public function confirmSelf($confirmUserId)
    {
        //公司审核状态
        $this->verified = 1;
        //用户auth表
        $auth = Yii::$app->authManager;
        $auth->revokeAll($this->user_id);
        $userNewRole = $auth->getRole('company');
        $auth->assign($userNewRole, $this->user_id);
        //用户的个人状态
        $model = User::find()->where(['user_id' => $this->user_id])->one();
        $model->user_identityid = User::COMPANY;
        $model->save();
        //审核记录表添加记录
        $verifiedCompany = new VerifiedCompany();
        $verifiedCompany->company_id = $this->company_id;
        $verifiedCompany->verified_user_id = $confirmUserId;
        $verifiedCompany->verified_status = 1;
        $verifiedCompany->verified_time = time();
        $verifiedCompany->save();
    }
            
            
}
