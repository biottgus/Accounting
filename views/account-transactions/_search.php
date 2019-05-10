<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTransactionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-transactions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_account_transactions') ?>

    <?= $form->field($model, 'datetime_account_transactions') ?>

    <?= $form->field($model, 'date_account_transactions') ?>

    <?= $form->field($model, 'id_accounts') ?>

    <?= $form->field($model, 'value_account_transactions') ?>

    <?php // echo $form->field($model, 'id_currency') ?>

    <?php // echo $form->field($model, 'concept_account_transactions') ?>

    <?php // echo $form->field($model, 'document_account_transactions') ?>

    <?php // echo $form->field($model, 'id_users') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
