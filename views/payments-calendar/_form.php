<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentsCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_payments_calendar')->textInput() ?>

    <?= $form->field($model, 'id_account')->textInput() ?>

    <?= $form->field($model, 'id_users')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
