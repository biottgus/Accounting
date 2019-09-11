<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentsCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendario de pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-calendar-index">

    <h1><?php //echo Html::encode($this->title);  ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        // desde aca es krakik
//        'showPageSummary' => true,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'panel' => [
            'type' => 'info',
            'footer' => true,
            'heading' => 'Calendario de Pagos'
        ],
        'toolbar' => [
            [
                'content' =>
                Html::a('Agregar un calendario', ['create'], ['class' => 'btn btn-success']),
                'options' => ['class' => 'btn-group mr-2']
            ],
            '{export}',
        ],
        'floatHeader' => true,
        'condensed' => true,
        'responsive' => true,
        'responsiveWrap' => false,
//        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        // desde aca es krakik
        'columns' => [
            'id_payments_calendar',
            'date_payments_calendar',
            [
                'attribute' => 'id_account',
                'value' => function($model) {
                    return $model->account->name_accounts;
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'id_account',
                    'data' => ArrayHelper::map(\app\models\Accounts::find()->orderBy('name_accounts')->all(), 'id_accounts', 'name_accounts'),
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'pluginOptions' => [
                        'placeholder' => 'Seleccionar Cuenta...',
                        'loadingText' => 'Cuentas...',
                    ],
                ]),
            ],
            'value_payments_calendar',
            'description_payments_calendar',
            [
                'attribute' => 'value_payments_calendar',
                'format' => ['decimal', '2'],
                'value' => function($model) {
                    $value = $model->value_payments_calendar;
                    return $value;
                    ;
                },
                'contentOptions' => ['style' => 'text-align:right'],
                'footerOptions' => ['style' => 'text-align:right; font-weight: bold;'],
                'footer' => \app\models\PaymentsCalendar::getTotal($dataProvider->models, 'value_payments_calendar'),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>