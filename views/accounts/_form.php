<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Accounts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accounts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_accounts')->textInput() ?>

    <?= $form->field($model, 'id_account_types')->dropDownList(ArrayHelper::map(app\models\AccountTypes::find()->orderBy('name_account_types')->all(), 'id_account_types', 'name_account_types')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
