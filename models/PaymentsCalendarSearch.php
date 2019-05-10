<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaymentsCalendar;

/**
 * PaymentsCalendarSearch represents the model behind the search form of `app\models\PaymentsCalendar`.
 */
class PaymentsCalendarSearch extends PaymentsCalendar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_payments_calendar', 'id_account', 'id_users'], 'integer'],
            [['date_payments_calendar'], 'safe'],
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
        $query = PaymentsCalendar::find();

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
            'id_payments_calendar' => $this->id_payments_calendar,
            'date_payments_calendar' => $this->date_payments_calendar,
            'id_account' => $this->id_account,
            'id_users' => $this->id_users,
        ]);

        return $dataProvider;
    }
}
