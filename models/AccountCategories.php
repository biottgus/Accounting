<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_categories".
 *
 * @property int $id_account_categories
 * @property int $id_categories
 * @property int $id_accounts
 *
 * @property Accounts $accounts
 * @property Categories $categories
 */
class AccountCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categories', 'id_accounts'], 'required'],
            [['id_categories', 'id_accounts'], 'default', 'value' => null],
            [['id_categories', 'id_accounts'], 'integer'],
            [['id_accounts'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['id_accounts' => 'id_accounts']],
            [['id_categories'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['id_categories' => 'id_categories']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_account_categories' => 'ID',
            'id_categories' => 'ID Categoría',
            'id_accounts' => 'ID Cuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasOne(Accounts::className(), ['id_accounts' => 'id_accounts']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id_categories' => 'id_categories']);
    }
    
    
        /**
     * 
     * @param type $idope
     * @return type
     */
    public function getAccountsByCategories($id) {
        $result = Array();
        $connection = Yii::$app->getDb();
        $sSQL = "SELECT id_accounts, name_accounts FROM view_accounts_categories WHERE id_categories='$id' order by name_accounts";
        $command = $connection->createCommand($sSQL, []);
        $posts = $command->queryAll();
        $i = 0;
        foreach ($posts as $record) {
            $result[$i]['id'] = $record['id_accounts'];
            $result[$i]['name'] = $record['name_accounts'];
            $i++;
        }
        return $result;
    }

}
