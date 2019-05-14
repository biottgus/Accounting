<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_account_types')->textInput() ?>

    <?= $form->field($model, 'type_account_types')->dropDownList($model->tipoCuenta) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
