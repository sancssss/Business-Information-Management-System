<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $user_id;
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
            [['user_id', 'user_password'], 'required', 'message'=> '此项不能为空'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
        ];
    }

    
    public function validatePassword()
    {
        $model = User::findOne($this->user_id);
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
            $identity = User::findOne($this->user_id);
            return Yii::$app->user->login($identity, $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

      public function attributeLabels() {
        return [
            'user_id' => '用户ID',
            'user_password' => '密码',
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
