<?php

namespace app\models\user\admin;

use app\models\user\User;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\verified\VerifiedManager;
use Yii;

class AdminUser extends User{
    
    public function attributeLabels() {
        $lables = [
            'confirmLink' => '确认身份',
            'userDetailLink' => '详细信息'
        ];
        return array_merge($lables, parent::attributeLabels());
    }
    
    /*
     * 管理员审核
     */
    public function confirmSelf($confirmUserId)
    {
        $auth = Yii::$app->authManager;
        $auth->revokeAll($this->user_id);
                
        if($this->user_identityid == static::NOTCHECK_COUNTY_ADMIN){
            //用户表身份信息
            $this->user_identityid = static::COUNTY_ADMIN;
            //auth表用户信息
            $userNewRole = $auth->getRole('county_admin');
        }
        
        if($this->user_identityid == static::NOTCHECK_CITY_ADMIN){
            $this->user_identityid = static::CITY_ADMIN;
            $userNewRole = $auth->getRole('city_admin');
        }
        //审核记录表信息
        $auth->assign($userNewRole, $this->user_id);
        $verifiedManager = new VerifiedManager();
        $verifiedManager->admin_user_id = $this->user_id;
        $verifiedManager->verified_user_id = $confirmUserId;
        $verifiedManager->verified_status = 1;
        $verifiedManager->verified_time = time();
        $verifiedManager->save();
    }
    /**
     * 返回每个未认证企业用户的认证确认连接
     * @return Html 
     */
    public function getConfirmLink()
    {
        if($this->user_identityid == static::COUNTY_ADMIN || $this->user_identityid == static::CITY_ADMIN){
             return Html::tag('a','已认证');
        }
        $url = Url::to(['/province-admin/confirm-admin', 'id' => $this->user_id]);
        $options =  ['class'=>'label label-primary'];
        return Html::a('确认', $url, $options);
    }
    /**
     * 返回每个用户的详细资料链接
     * @return Html
     */
    public function getUserDetailLink()
    {
        $url = Url::to(['/province-admin/admin-details', 'id' => $this->user_id]);
        $options =  [];
        return Html::a($this->user_name, $url, $options);
    }
}

?>

