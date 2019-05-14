<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentsCalendar */

$this->title = 'Modificar: ' . $model->id_payments_calendar;
$this->params['breadcrumbs'][] = ['label' => 'Calendario de pago', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_payments_calendar, 'url' => ['view', 'id' => $model->id_payments_calendar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payments-calendar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>