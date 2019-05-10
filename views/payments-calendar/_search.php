<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentsCalendarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-calendar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_payments_calendar') ?>

    <?= $form->field($model, 'date_payments_calendar') ?>

    <?= $form->field($model, 'id_account') ?>

    <?= $form->field($model, 'id_users') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
