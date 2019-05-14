<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTypes */

$this->title = $model->id_account_types;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de cuenta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="account-types-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_account_types], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_account_types], [
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
            'id_account_types',
            'name_account_types',
            'type_account_types',
            [
                'attribute' => 'type_account_types',
                'value' => function($model) {
                    return $model->tipoCuenta[$model->type_account_types];
                },
            ],
        ],
    ]) ?>

</div>
