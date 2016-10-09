<?php

namespace app\models\FormModel;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SpecialSignupForm extends  \yii\base\Model{
    
    public $user_name;
    public $user_password;
    public $user_confirm_password;
    public $some_info;
    
    public function rules() {
         return [
            [['user_name', 'user_password', 'user_confirm_password', 'some_info'], 'required'],
            [['user_name'], 'string', 'max' => 32],
            [['user_password', 'user_confirm_password'], 'string', 'max' => 32],
            [['user_confirm_password'], 'compare', 'compareAttribute' => 'user_password']
            ];
    }
    
    public function attributeLabels() {
        return [
            'user_name' => '用户名',
            'user_password' => '密码',
            'user_confirm_password' =>'确认密码',
            'some_info' => '一些其它信息'
        ];
    }
    
    
}

