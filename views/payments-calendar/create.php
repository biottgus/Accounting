<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentsCalendar */

$this->title = 'Create Payments Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Payments Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
