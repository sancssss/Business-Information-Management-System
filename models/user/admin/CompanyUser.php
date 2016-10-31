<?php

namespace app\models\user\admin;

use app\models\user\User;

class CompanyUser extends User{
    
    public function attributeLabels() {
        $lables = [
            'confirmLink' => '确认身份',
            'userDetailLink' => '详细信息'
        ];
        return array_merge($lables, parent::attributeLabels());
    }
    
    /**
     * 返回每个未认证企业用户的认证确认连接
     * @return Html 
     */
    public function getConfirmLink()
    {
        if($this->user_identityid == User::ROLE_USER){
             return Html::tag('a','已认证');
        }
        $url = Url::to(['/manager/confirm-user', 'uid' => $this->user_id]);
        $options =  ['class'=>'label label-primary'];
        return Html::a('确认', $url, $options);
    }
    /**
     * 返回每个用户的详细资料链接
     * @return Html
     */
    public function getUserDetailLink()
    {
        $url = Url::to(['/manager/user-detail', 'uid' => $this->user_id]);
        $options =  [];
        return Html::a($this->user_name, $url, $options);
    }
}

?>

