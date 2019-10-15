<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;

$this->title = 'Resumen por Categorías';
$this->params['breadcrumbs'][] = $this->title;

echo "<h1>Resumen por Categorías</h1>";
$form = ActiveForm::begin();

// Fechas
if (!$model->beginDate)
    $model->beginDate = date('Y-m-01');
if (!$model->endDate)
    $model->endDate = date('Y-m-d');

echo $form->field($model, 'cat')->widget(Select2::className(), [
    'data' => ArrayHelper::map(\app\models\Categories::find()->orderBy('name_categories')->all(), 'id_categories', 'name_categories'),
    'pluginOptions' => [
        'placeholder' => 'Categorias...',
        'loadingText' => 'Cargando...',
    ]
]);

// Servicios
//echo $form->field($model, 'acc')->widget(DepDrop::classname(), [
//    'type' => DepDrop::TYPE_SELECT2,
//    'options' => [
//        'id' => 'subcat-id',
//        'multiple' => true,
//    ],
//    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
//    'pluginOptions' => [
//        'depends' => ['reportcategories-cat'],
//        'placeholder' => '',
//        'url' => Url::to(['/site/accounts-by-categories']),
//        'loadingText' => 'Cargando ...',
//    ]
//]);
?>

<div class="form-group">
    <?= Html::submitButton('Analizar', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();
?>