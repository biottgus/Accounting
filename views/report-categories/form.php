<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Resumen';
$this->params['breadcrumbs'][] = $this->title;

echo "<h1>Resumen</h1>";
$form = ActiveForm::begin();

// Fechas
if (!$model->beginDate)
    $model->beginDate = date('Y-m-01');
if (!$model->endDate)
    $model->endDate = date('Y-m-d');

echo $form->field($model, 'beginDate')->input('date');
echo $form->field($model, 'endDate')->input('date');
?>

<div class="form-group">
    <?= Html::submitButton('Analizar', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();
?>