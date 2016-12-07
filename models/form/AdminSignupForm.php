<?php

namespace app\models\form;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminSignupForm extends  \yii\base\Model{
    
    public $signup_type;
    public $user_name;
    public $user_password;
    public $user_confirm_password;
    public $user_nickname;
    public $user_phone_number;
    public $user_sex;
    public $user_email;
    public $user_birthday;
    public $user_id_number;
    public $user_address;
    public $user_zip_code;
    public $user_legal_person;
    public $user_type;
    public $region_id;
    public $user_comment;
    
    public function rules() {
         return [
            [['user_name', 'user_password', 'user_confirm_password', 'user_nickname','user_phone_number' ,'user_birthday', 'user_sex', 'user_email', 'user_zip_code', 'user_legal_person', 'user_comment','user_id_number', 'user_address', 'user_type', 'region_id'], 'required'],
            [['user_name'], 'string', 'max' => 32],
            [['user_password', 'user_confirm_password'], 'string', 'max' => 32],
            [['user_confirm_password'], 'compare', 'compareAttribute' => 'user_password'],
 
            ];
    }
    
    public function attributeLabels() {
        return [
            'signup_type' => '注册类型',
            'user_name' => '用户名',
            'user_password' => '密码',
            'user_confirm_password' =>'确认密码',
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
            'c' => '行政代码',
            'user_comment' => '备注信息',
        ];
    }
    
    
}

