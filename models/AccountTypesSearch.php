<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccountTypes;

/**
 * AccountTypesSearch represents the model behind the search form of `app\models\AccountTypes`.
 */
class AccountTypesSearch extends AccountTypes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_account_types', 'type_account_types'], 'integer'],
            [['name_account_types'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = AccountTypes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->orderBy(['name_account_types' => SORT_ASC]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_account_types' => $this->id_account_types,
            'type_account_types' => $this->type_account_types,
        ]);

        $query->andFilterWhere(['ilike', 'name_account_types', $this->name_account_types]);

        return $dataProvider;
    }
}
