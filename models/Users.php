<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id_users
 * @property string $name_users
 * @property string $login_users
 * @property string $passwd_users
 * @property string $mail_users
 *
 * @property AccountTransactions[] $accountTransactions
 * @property PaymentsCalendar[] $paymentsCalendars
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_users', 'login_users', 'passwd_users', 'mail_users'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_users' => 'ID',
            'name_users' => 'Nombre',
            'login_users' => 'Login',
            'passwd_users' => 'Password',
            'mail_users' => 'Mail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTransactions()
    {
        return $this->hasMany(AccountTransactions::className(), ['id_users' => 'id_users']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentsCalendars()
    {
        return $this->hasMany(PaymentsCalendar::className(), ['id_users' => 'id_users']);
    }
}
