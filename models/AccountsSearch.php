<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accounts;

/**
 * AccountsSearch represents the model behind the search form of `app\models\Accounts`.
 */
class AccountsSearch extends Accounts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_accounts', 'id_account_types'], 'integer'],
            [['name_accounts'], 'safe'],
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
        $query = Accounts::find();

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
            'id_accounts' => $this->id_accounts,
            'id_account_types' => $this->id_account_types,
        ]);

        $query->andFilterWhere(['ilike', 'name_accounts', $this->name_accounts]);

        return $dataProvider;
    }
}
