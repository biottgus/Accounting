<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ReportAnalisis;

/**
 * 
 */
class ReportAnalisisController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'form', 'results'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                // everything else is denied
                ],
            ],
        ];
    }

    /**
     * 
     * @return type
     */
    public function actionIndex() {
        $model = new ReportAnalisis();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('results', ['model' => $model]);
        } else {
            return $this->render('form', ['model' => $model]);
        }
    }

}
