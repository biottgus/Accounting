<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id_categories
 * @property string $name_categories
 *
 * @property AccountCategories[] $accountCategories
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_categories'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categories' => 'Id',
            'name_categories' => 'Categoría',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCategories()
    {
        return $this->hasMany(AccountCategories::className(), ['id_categories' => 'id_categories']);
    }
}
