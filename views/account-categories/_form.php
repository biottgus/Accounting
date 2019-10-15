<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\AccountCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'id_categories')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\Categories::find()->orderBy('name_categories')->all(), 'id_categories', 'name_categories'),
        'pluginOptions' => [
            'placeholder' => 'Seleccionar...',
            'loadingText' => 'Categ...',
        ]
    ]);
    echo $form->field($model, 'id_accounts')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\app\models\Accounts::find()->orderBy('name_accounts')->all(), 'id_accounts', 'name_accounts'),
        'pluginOptions' => [
            'placeholder' => 'Seleccionar Cuenta...',
            'loadingText' => 'Cuentas...',
        ]
    ]);

    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
