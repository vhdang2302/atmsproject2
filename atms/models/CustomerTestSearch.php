<?php

namespace atms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use atms\models\Customer;

/**
 * CustomerTestSearch represents the model behind the search form about `atms\models\Customer`.
 */
class CustomerTestSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'person_id', 'deleted', 'company_id'], 'integer'],
        ];
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
        $query = Customer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'person_id' => $this->person_id,
            'deleted' => $this->deleted,
            'company_id' => $this->company_id,
        ]);

        return $dataProvider;
    }
}
