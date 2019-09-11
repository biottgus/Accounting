<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments_calendar".
 *
 * @property int $id_payments_calendar
 * @property string $date_payments_calendar
 * @property int $id_account
 * @property int $id_users
 *
 * @property Accounts $account
 * @property Users $users
 */
class PaymentsCalendar extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'payments_calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['date_payments_calendar'], 'safe'],
            [['id_account', 'id_users'], 'required'],
            [['id_account', 'id_users'], 'default', 'value' => null],
            [['value_payments_calendar'], 'number'],
            [['description_payments_calendar'], 'string'],
            [['id_account', 'id_users'], 'integer'],
            [['id_account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['id_account' => 'id_accounts']],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_users' => 'id_users']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_payments_calendar' => 'ID',
            'date_payments_calendar' => 'Fecha',
            'value_payments_calendar' => 'Importe',
            'id_account' => 'Cuenta',
            'id_users' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount() {
        return $this->hasOne(Accounts::className(), ['id_accounts' => 'id_account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasOne(Users::className(), ['id_users' => 'id_users']);
    }

    /**
     * 
     * @param type $provider
     * @param type $fieldName
     * @return type
     */
    public static function getTotal($provider, $fieldName) {
        $total = 0;
        foreach ($provider as $item) {
//            $sign = Accounts::findOne($item['id_accounts'])->accountTypes->type_account_types;
            $sign = 1;
            $total += $item[$fieldName] * $sign;
        }

        return number_format($total, 2);
    }

}
