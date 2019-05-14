<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property int $id_accounts
 * @property string $name_accounts
 * @property int $id_account_types
 *
 * @property AccountTransactions[] $accountTransactions
 * @property AccountTypes $accountTypes
 * @property PaymentsCalendar[] $paymentsCalendars
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_accounts'], 'string'],
            [['id_account_types'], 'default', 'value' => null],
            [['id_account_types'], 'integer'],
            [['id_account_types'], 'exist', 'skipOnError' => true, 'targetClass' => AccountTypes::className(), 'targetAttribute' => ['id_account_types' => 'id_account_types']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_accounts' => 'ID',
            'name_accounts' => 'Nombre de la cuenta',
            'id_account_types' => 'Tipo de cuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTransactions()
    {
        return $this->hasMany(AccountTransactions::className(), ['id_account' => 'id_accounts']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTypes()
    {
        return $this->hasOne(AccountTypes::className(), ['id_account_types' => 'id_account_types']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentsCalendars()
    {
        return $this->hasMany(PaymentsCalendar::className(), ['id_account' => 'id_accounts']);
    }
}
