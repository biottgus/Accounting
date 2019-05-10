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
            'id_account_types' => 'Id Account Types',
            'name_account_types' => 'Name Account Types',
            'type_account_types' => 'Type Account Types',
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
