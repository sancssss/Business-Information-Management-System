<?php

namespace app\models\FormModel;

use yii\base\Model;
use app\models\User;

class UpdateUserForm extends Model
{
    public $user_name;
    public $user_password;
    public $user_someinfo ;


    
    public function rules()
    {
        return [
            ['user_name', 'required', 'message'=> '用户ID不能为空'],
            ['user_someinfo', 'required', 'message' => '信息不能为空'],
            ['user_password', 'required', 'message'=> '用户密码不能为空'],
        ];
    }

      public function attributeLabels() {
        return [
            'user_name' => '用户名',
            'user_password' => '密码',
            'user_someinfo' => '用户信息'
        ];
    }
    
}
