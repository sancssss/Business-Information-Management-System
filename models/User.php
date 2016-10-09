<?php

namespace app\models;

use yii\web\IdentityInterface;
use yii\helpers\Url;
use yii\helpers\Html;
use Yii;

/**
 * This is the model class for table "yii_user".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_password
 * @property integer $user_identityid
 * 1代表企业用户,2代表管理用户,3代表未审核用户,4代表未审核管理,5代表超级管理员.
 * @property string $some_info
 * @property String $user_authkey
 *
 * @property YiiIdentity $userIdentity
 * @property YiiUser1Detail $yiiUser1Details
 * @property YiiUser2Detail $yiiUser2Details
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    
    const ROLE_USER = 1;
    const ROLE_MANAGER = 2;
    const ROLE_NOCHECK_USER = 3;
    const ROLE_NOCHECK_MANAGER = 4;
    const ROLE_ADMIN = 5;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user';
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->user_authkey = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
    
    
    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
     public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    
    /**
     * @return int|string 当前用户ID
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @return string 当前用户的（cookie）认证密钥
     */
    public function getAuthKey()
    {
        return $this->user_authkey;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public function scenarios() {
        return parent::scenarios();
    }
 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'user_password', 'user_identityid'], 'required'],
            [['user_identityid'], 'integer'],
            [['user_name'], 'string', 'max' => 255],
            [['user_password'], 'string', 'max' => 32],
            [['user_identityid'], 'exist', 'skipOnError' => true, 'targetClass' => Identity::className(), 'targetAttribute' => ['user_identityid' => 'identity_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户ID',
            'user_name' => '用户名',
            'user_password' => '密码',
            'user_identityid' => '用户身份',
            'confirmLink' => '确认身份',
            'userDetailLink' => '详细信息'
        ];
    }

    
    public function setPassword($password)
    {
        $this->user_password = md5($password);
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasOne(AuthAssignment::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemNames()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'item_name'])->viaTable('auth_assignment', ['user_id' => 'user_id']);
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdentity()
    {
        return $this->hasOne(Identity::className(), ['identity_id' => 'user_identityid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser1Detail()
    {
        return $this->hasOne(User1Details::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser2Detail()
    {
        return $this->hasOne(User2Details::className(), ['userid' => 'user_id']);
    }
}
