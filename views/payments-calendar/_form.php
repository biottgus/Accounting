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

    <?= $form->field($model, 'date_payments_calendar')->input('date') ?>

    <?= $form->field($model, 'id_account')->dropDownList(ArrayHelper::map(app\models\Accounts::find()->orderBy('name_accounts')->all(), 'id_accounts', 'name_accounts')) ?>

    <?= $form->field($model, 'value_payments_calendar')->input('decimal') ?>

    <?php
//echo $form->field($model, 'id_users')->textInput();
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
