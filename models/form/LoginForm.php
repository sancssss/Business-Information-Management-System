<?php

namespace app\models\form;

use Yii;
use yii\base\Model;
use app\models\user\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $user_name;
    public $user_password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    
    public function rules()
    {
        return [
            // username and password are both required
            ['user_name', 'required', 'message'=> '用户名不能为空'],
            ['user_password', 'required', 'message'=> '用户密码不能为空'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
        ];
    }

    
    public function validatePassword()
    {
        $model = User::findOne(['user_name' => $this->user_name]);
        if($model != null && ($model->user_password == md5($this->user_password)) ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validatePassword()) {
            $identity = User::findOne(['user_name' => $this->user_name]);
            return Yii::$app->user->login($identity, $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

      public function attributeLabels() {
        return [
            'user_name' => '用户名',
            'user_password' => '密码',
            'rememberMe' => '保持登录'
        ];
    }
    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->user_id);
        }

        return $this->_user;
    }
}
