<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTransactions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-transactions-form">

    <?php
    $form = ActiveForm::begin();
    if (!$model->date_account_transactions)
        $model->date_account_transactions = date('Y-m-d');

    echo $form->field($model, 'id_accounts')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\Accounts::find()->orderBy('name_accounts')->all(), 'id_accounts', 'name_accounts'),
        'pluginOptions' => [
            'placeholder' => 'Seleccionar Cuenta...',
            'loadingText' => 'Cuentas...',
        ]
    ]);

    echo $form->field($model, 'date_account_transactions')->input('date');
    echo $form->field($model, 'id_currency')->dropDownList(ArrayHelper::map(app\models\Currencies::find()->orderBy('iso_currency')->all(), 'id_currency', 'iso_currency'));
    echo $form->field($model, 'value_account_transactions')->input('decimal');
    echo $form->field($model, 'concept_account_transactions')->textarea();
    echo $form->field($model, 'document_account_transactions')->textInput();
    echo $form->field($model, 'id_users')->hiddenInput(['value' => '1'])->label(false);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
