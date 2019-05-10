<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccountTransactions;

/**
 * AccountTransactionsSearch represents the model behind the search form of `app\models\AccountTransactions`.
 */
class AccountTransactionsSearch extends AccountTransactions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_account_transactions', 'id_account', 'id_currency', 'id_users'], 'integer'],
            [['datetime_account_transactions', 'date_account_transactioins', 'concept_account_transactions', 'document_account_transactions'], 'safe'],
            [['value_account_transactions'], 'number'],
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
        $query = AccountTransactions::find();

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
            'id_account_transactions' => $this->id_account_transactions,
            'datetime_account_transactions' => $this->datetime_account_transactions,
            'date_account_transactioins' => $this->date_account_transactioins,
            'id_account' => $this->id_account,
            'value_account_transactions' => $this->value_account_transactions,
            'id_currency' => $this->id_currency,
            'id_users' => $this->id_users,
        ]);

        $query->andFilterWhere(['ilike', 'concept_account_transactions', $this->concept_account_transactions])
            ->andFilterWhere(['ilike', 'document_account_transactions', $this->document_account_transactions]);

        return $dataProvider;
    }
}
