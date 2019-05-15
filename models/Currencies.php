<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currencies".
 *
 * @property int $id_currency
 * @property string $name_currency
 * @property string $iso_currency
 * @property int $default_currency
 * @property double $exchange_currency
 *
 * @property AccountTransactions[] $accountTransactions
 */
class Currencies extends \yii\db\ActiveRecord {

    public $defaultCurrency = [
        1 => 'Moneda Default',
        0 => 'NO',
    ];
    public $filterDefaultCurrency = [
        ['id' => 1, 'value' => 'Moneda Default'],
        ['id' => 0, 'value' => 'NO'],
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'currencies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name_currency', 'iso_currency'], 'string'],
            [['default_currency'], 'default', 'value' => null],
            [['default_currency'], 'integer'],
            [['exchange_currency'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_currency' => 'ID',
            'name_currency' => 'Nombre',
            'iso_currency' => 'Código ISO',
            'default_currency' => 'Default del sistema',
            'exchange_currency' => 'Valor actual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTransactions() {
        return $this->hasMany(AccountTransactions::className(), ['id_currency' => 'id_currency']);
    }

}
