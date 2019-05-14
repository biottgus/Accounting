<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentsCalendar */

$this->title = 'Agregar pago al calendario';
$this->params['breadcrumbs'][] = ['label' => 'Calendario de pago', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
