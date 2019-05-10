<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTransactions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-transactions-form">

    <?php
    $form = ActiveForm::begin();

    echo $form->field($model, 'date_account_transactioins')->input('date');
    echo $form->field($model, 'id_account')->dropDownList(ArrayHelper::map(app\models\Accounts::find()->orderBy('name_accounts')->all(), 'id_accounts', 'name_accounts'));
    echo $form->field($model, 'id_currency')->dropDownList(ArrayHelper::map(app\models\Currencies::find()->orderBy('iso_currency')->all(), 'id_currency', 'iso_currency'));
    echo $form->field($model, 'value_account_transactions')->input('decimal');
    echo $form->field($model, 'concept_account_transactions')->textarea();
    echo $form->field($model, 'document_account_transactions')->textInput();
//    echo $form->field($model, 'id_users')->textInput();
//    echo $form->field($model, 'datetime_account_transactions')->textInput();
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
