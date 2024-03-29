<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Currencies */

$this->title = 'Modicar Moneda: ' . $model->id_currency;
$this->params['breadcrumbs'][] = ['label' => 'Monedas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_currency, 'url' => ['view', 'id' => $model->id_currency]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="currencies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
