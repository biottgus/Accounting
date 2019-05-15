<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Currencies */

$this->title = $model->id_currency;
$this->params['breadcrumbs'][] = ['label' => 'Monedas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="currencies-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_currency], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_currency], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_currency',
            'name_currency',
            'iso_currency',
            [
                'attribute' => 'default_currency',
                'value' => function($model) {
                    return $model->default[$model->default_currency];
                },
            ],
            'exchange_currency',
            [
                'attribute' => 'exchange_currency',
                'format'=> ['decimal', '2'],
                'value' => function($model) {
                    return $model->exchange_currency;
                },
            ],
        ],
    ]) ?>

</div>
