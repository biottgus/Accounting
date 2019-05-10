<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CurrenciesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currencies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_currency') ?>

    <?= $form->field($model, 'name_currency') ?>

    <?= $form->field($model, 'iso_currency') ?>

    <?= $form->field($model, 'default_currency') ?>

    <?= $form->field($model, 'exchange_currency') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
