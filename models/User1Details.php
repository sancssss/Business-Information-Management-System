<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_user1_details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $some_info
 *
 * @property YiiUser $user
 */
class User1Details extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user1_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['some_info'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'some_info' => 'Some Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(YiiUser::className(), ['user_id' => 'user_id']);
    }
}
