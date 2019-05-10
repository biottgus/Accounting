<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_accounts".
 *
 * @property int $id_accounts
 * @property string $name_accounts
 * @property int $id_account_types
 * @property string $name_account_types
 * @property int $type_account_types
 */
class ViewAccounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_accounts', 'id_account_types', 'type_account_types'], 'default', 'value' => null],
            [['id_accounts', 'id_account_types', 'type_account_types'], 'integer'],
            [['name_accounts', 'name_account_types'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_accounts' => 'Id Accounts',
            'name_accounts' => 'Name Accounts',
            'id_account_types' => 'Id Account Types',
            'name_account_types' => 'Name Account Types',
            'type_account_types' => 'Type Account Types',
        ];
    }
}
