<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentsCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_account')->dropDownList(ArrayHelper::map(app\models\Accounts::find()->orderBy('name_accounts')->all(), 'id_accounts', 'name_accounts')) ?>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <?= $form->field($model, 'date_payments_calendar')->input('date') ?>
        </div>
        <div class="col-xs-12 col-sm-6">
            <?= $form->field($model, 'value_payments_calendar')->input('decimal') ?>
        </div>
    </div>
    <?= $form->field($model, 'description_payments_calendar')->input('text') ?>

    <?php
    echo $form->field($model, 'id_users')->hiddenInput(['value' => '1'])->label(false);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?php
        if ($model->id_payments_calendar > 0)
            echo Html::a('Pagar Ahora', ['pay', 'id' => $model->id_payments_calendar], ['class' => 'btn btn-success']);
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
