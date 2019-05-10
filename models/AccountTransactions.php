<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_transactions".
 *
 * @property int $id_account_transactions
 * @property string $datetime_account_transactions
 * @property string $date_account_transactioins
 * @property int $id_account
 * @property double $value_account_transactions
 * @property int $id_currency
 * @property string $concept_account_transactions
 * @property string $document_account_transactions
 * @property int $id_users
 *
 * @property Accounts $account
 * @property Currencies $currency
 * @property Users $users
 */
class AccountTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime_account_transactions', 'date_account_transactioins'], 'safe'],
            [['id_account', 'id_currency', 'id_users'], 'required'],
            [['id_account', 'id_currency', 'id_users'], 'default', 'value' => null],
            [['id_account', 'id_currency', 'id_users'], 'integer'],
            [['value_account_transactions'], 'number'],
            [['concept_account_transactions', 'document_account_transactions'], 'string'],
            [['id_account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['id_account' => 'id_accounts']],
            [['id_currency'], 'exist', 'skipOnError' => true, 'targetClass' => Currencies::className(), 'targetAttribute' => ['id_currency' => 'id_currency']],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_users' => 'id_users']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_account_transactions' => 'Id Account Transactions',
            'datetime_account_transactions' => 'Datetime Account Transactions',
            'date_account_transactioins' => 'Date Account Transactioins',
            'id_account' => 'Id Account',
            'value_account_transactions' => 'Value Account Transactions',
            'id_currency' => 'Id Currency',
            'concept_account_transactions' => 'Concept Account Transactions',
            'document_account_transactions' => 'Document Account Transactions',
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
    public function getCurrency()
    {
        return $this->hasOne(Currencies::className(), ['id_currency' => 'id_currency']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id_users' => 'id_users']);
    }
}
