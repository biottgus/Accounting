<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use marekpetras\calendarview\CalendarView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentsCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendario de pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-calendar-index">

    <h1><?php //echo Html::encode($this->title); ?></h1>

    <p>
        <?= Html::a('Agregar un pago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
//    echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id_payments_calendar',
//            'date_payments_calendar',
//            [
//                'attribute' => 'id_account',
//                'value' => function($model) {
//                    return $model->account->name_accounts;
//                },
//                'filter' => ArrayHelper::map(app\models\Accounts::find()->orderBy('name_accounts')->All(), 'id_accounts', 'name_accounts'),
//            ],
////            'id_users',
//            'value_payments_calendar',
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
<?php
echo CalendarView::widget(
        [
            // mandatory
            'dataProvider' => $dataProvider,
            'dateField' => 'date_payments_calendar',
            'valueField' => 'value_payments_calendar',
            // optional params with their defaults
            'weekStart' => 1, // date('w') // which day to display first in the calendar
            'title' => 'Calendario de Pagos',
            'views' => [
                'calendar' => '@vendor/marekpetras/yii2-calendarview-widget/views/calendar',
                'month' => '@vendor/marekpetras/yii2-calendarview-widget/views/month',
                'day' => '@vendor/marekpetras/yii2-calendarview-widget/views/day',
            ],
            'startYear' => date('Y') - 1,
            'endYear' => date('Y') + 1,
//            'link' => false,
//              'link' => 'payments-calendar/view',
            'link' => function($model, $calendar) {
                return ['payments-calendar/view', 'id' => $model->id_payments_calendar];
            },
            'dayRender' => false,
//            'dayRender' => function($model, $calendar) {
//                return '<p><small>' . $model->account->name_accounts.": ". $model->value_payments_calendar . '</small></p>';
//            },
        ]
);
?>