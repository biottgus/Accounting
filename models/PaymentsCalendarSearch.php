<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaymentsCalendar;

/**
 * PaymentsCalendarSearch represents the model behind the search form of `app\models\PaymentsCalendar`.
 */
class PaymentsCalendarSearch extends PaymentsCalendar {

    public $id_account_types;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_payments_calendar', 'id_account', 'id_users', 'id_account_types'], 'integer'],
            [['date_payments_calendar'], 'safe'],
            [['value_payments_calendar'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = PaymentsCalendar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->orderBy(['date_payments_calendar' => SORT_DESC]);
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
            'value_payments_calendar' => $this->value_payments_calendar,
            'id_account' => $this->id_account,
            'id_users' => $this->id_users,
        ]);

        // relation
        $query->andFilterWhere([
            'accounts.id_account_types' => $this->id_account_types,
        ]);

        return $dataProvider;
    }

}
