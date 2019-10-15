<?php

namespace app\models;

use yii\base\Model;

class ReportCategories extends Model {

    public $beginDate;
    public $endDate;
    public $acc;
    public $cat;

    /**
     * 
     * @return type
     */
    public function rules() {
        return [
            [['beginDate', 'endDate'], 'required'],
            ['beginDate', 'string'],
            ['endDate', 'string'],
            ['cat', 'string'],
            ['acc', 'string'],
        ];
    }

    /**
     * 
     * @return type
     */
    public function attributeLabels() {
        return [
            'beginDate' => 'Fecha inicio',
            'endDate' => 'Fecha fin',
            'cat' => 'Categoría',
            'acc' => 'Cuentas',
        ];
    }

    /**
     * 
     * @param type $provider
     * @param type $fieldName
     * @return type
     */
    public function getTotalColumn($provider, $fieldName) {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return number_format($total, 2);
    }
    /**
     * 
     * @param type $provider
     * @param type $fieldName
     * @return type
     */
    public function getTotalColumnWithoutFormat($provider, $fieldName) {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total;
    }

    /**
     * 
     * @param type $provider
     * @param type $fieldName
     * @return int
     */
    public function getAverage($provider, $fieldName) {
        $avg = 0;
        $total = 0;
        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }
        if (count($provider) > 0) {
            $avg = $total / count($provider);
        }
        return number_format($avg, 2);
    }

}
