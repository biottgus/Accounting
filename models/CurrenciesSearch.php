<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Currencies;

/**
 * CurrenciesSearch represents the model behind the search form of `app\models\Currencies`.
 */
class CurrenciesSearch extends Currencies
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_currency', 'default_currency'], 'integer'],
            [['name_currency', 'iso_currency'], 'safe'],
            [['exchange_currency'], 'number'],
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
        $query = Currencies::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->orderBy(['iso_currency', SORT_ASC]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_currency' => $this->id_currency,
            'default_currency' => $this->default_currency,
            'exchange_currency' => $this->exchange_currency,
        ]);

        $query->andFilterWhere(['ilike', 'name_currency', $this->name_currency])
            ->andFilterWhere(['ilike', 'iso_currency', $this->iso_currency]);

        return $dataProvider;
    }
}
