<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Currencies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currencies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_currency')->textInput() ?>

    <?= $form->field($model, 'iso_currency')->textInput() ?>

    <?= $form->field($model, 'default_currency')->dropDownList($model->default) ?>

    <?= $form->field($model, 'exchange_currency')->input('decimal') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
