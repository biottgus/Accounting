<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_types".
 *
 * @property int $id_account_types
 * @property string $name_account_types
 * @property int $type_account_types
 *
 * @property Accounts[] $accounts
 */
class AccountTypes extends \yii\db\ActiveRecord
{
    public $tipoCuenta = [
        -1 => 'Salida',
        1 => 'Ingreso',
    ];
    public $filterTipoCuenta = [
        ['id' => -1, 'value' => 'Salida'],
        ['id' => 1, 'value' => 'Ingreso'],
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_account_types'], 'string'],
            [['type_account_types'], 'default', 'value' => null],
            [['type_account_types'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_account_types' => 'ID',
            'name_account_types' => 'Nombre',
            'type_account_types' => 'Tipo de cuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Accounts::className(), ['id_account_types' => 'id_account_types']);
    }
}
