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
class PaymentsCalendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments_calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_payments_calendar'], 'safe'],
            [['id_account', 'id_users'], 'required'],
            [['id_account', 'id_users'], 'default', 'value' => null],
            [['id_account', 'id_users'], 'integer'],
            [['id_account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['id_account' => 'id_accounts']],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_users' => 'id_users']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_payments_calendar' => 'Id Payments Calendar',
            'date_payments_calendar' => 'Date Payments Calendar',
            'id_account' => 'Id Account',
            'id_users' => 'Id Users',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Accounts::className(), ['id_accounts' => 'id_account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id_users' => 'id_users']);
    }
}
