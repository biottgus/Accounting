<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_transactions".
 *
 * @property int $id_account_transactions
 * @property string $datetime_account_transactions
 * @property string $date_account_transactions
 * @property int $id_accounts
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
class AccountTransactions extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'account_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['datetime_account_transactions', 'date_account_transactions'], 'safe'],
            [['id_accounts', 'id_currency', 'id_users'], 'required'],
            [['id_accounts', 'id_currency', 'id_users'], 'default', 'value' => null],
            [['id_accounts', 'id_currency', 'id_users'], 'integer'],
            [['value_account_transactions'], 'number'],
            [['concept_account_transactions', 'document_account_transactions'], 'string'],
            [['id_accounts'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['id_accounts' => 'id_accounts']],
            [['id_currency'], 'exist', 'skipOnError' => true, 'targetClass' => Currencies::className(), 'targetAttribute' => ['id_currency' => 'id_currency']],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_users' => 'id_users']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_account_transactions' => 'ID',
            'datetime_account_transactions' => 'Datetime Account Transactions',
            'date_account_transactions' => 'Fecha',
            'id_accounts' => 'Cuenta',
            'value_account_transactions' => 'Importe',
            'id_currency' => 'Moneda',
            'concept_account_transactions' => 'Concepto',
            'document_account_transactions' => 'Documento',
            'id_users' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount() {
        return $this->hasOne(Accounts::className(), ['id_accounts' => 'id_accounts']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency() {
        return $this->hasOne(Currencies::className(), ['id_currency' => 'id_currency']);
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
        echo "<pre>";
        var_dump( $provider);
        var_dump( $fieldName);
        echo "</pre>";
//        foreach ($provider as $item) {
//            $sign = Accounts::findOne($item['id_accounts'])->accountTypes->type_account_types;
//            $total += $item[$fieldName] * $sign;
//        }

        return number_format($total, 2);
    }

}
