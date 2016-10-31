<?php


namespace app\models\form;

/**
 * 企业用户注册model
 */
class SignupForm extends \yii\base\Model{
    
    public $user_name;
    public $user_password;
    public $user_confirm_password;
    public $user_nickname;
    public $user_phone_number;
    public $user_sex;
    public $user_email;
    public $user_comment;
    
    public function rules() {
         return [
            [['user_name', 'user_password', 'user_confirm_password', 'user_nickname', 'user_phone_number', 'user_sex', 'user_email', ], 'required'],
            [['user_name'], 'string', 'max' => 32],
            [['user_password', 'user_confirm_password'], 'string', 'max' => 32],
            [['user_confirm_password'], 'compare', 'compareAttribute' => 'user_password'],
            [['user_nickname', 'user_phone_number'], 'string', 'max' => 20],
            [['user_sex'], 'string', 'max' => 10],
            [['user_email'], 'string', 'max' => 50],
            [['user_comment'], 'string', 'max' => 200], 
            ];
    }
    
    public function attributeLabels() {
        return [
            'user_name' => '用户名',
            'user_password' => '密码',
            'user_confirm_password' =>'确认密码',
            'user_nickname' => '用户姓名',
            'user_sex' => '用户性别',
            'user_phone_number' => '手机号码',
            'user_email' => '用户邮箱',
            'user_comment' => '备注信息',
        ];
    }
    
    
}

