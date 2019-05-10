<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTransactions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-transactions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datetime_account_transactions')->textInput() ?>

    <?= $form->field($model, 'date_account_transactioins')->textInput() ?>

    <?= $form->field($model, 'id_account')->textInput() ?>

    <?= $form->field($model, 'value_account_transactions')->textInput() ?>

    <?= $form->field($model, 'id_currency')->textInput() ?>

    <?= $form->field($model, 'concept_account_transactions')->textInput() ?>

    <?= $form->field($model, 'document_account_transactions')->textInput() ?>

    <?= $form->field($model, 'id_users')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
