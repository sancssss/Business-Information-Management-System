<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YiiUser;

/**
 * YiiIUserSearch represents the model behind the search form about `app\models\YiiUser`.
 */
class YiiIUserSearch extends YiiUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_identityid'], 'integer'],
            [['user_name', 'user_password'], 'safe'],
            ['userIdentity.identity_name','safe'],
        ];
    }
    /**
     * 加入userIdentity.identity_name属性
     * @return array
     */
    public function attributes() {
       return array_merge( parent::attributes(),['userIdentity.identity_name']);
    }
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = YiiUser::find();
        $query->joinWith(['userIdentity' => function($query){ $query->from(['userIdentity' => 'yii_identity']);}]);//userIdentity为方法名
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['userIdentity.identity_name'] = [
            'asc' => ['userIdentity.identity_name' => SORT_ASC],
            'desc' => ['userIdentity.identity_name' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'user_identityid' => $this->user_identityid,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'user_password', $this->user_password])
            ->andFilterWhere(['like', 'userIdentity.identity_name', $this->getAttribute('userIdentity.identity_name')]);
       Yii::trace($dataProvider,"nihao");
        return $dataProvider;
    }
}
