<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountCategories */

$this->title = $model->id_account_categories;
$this->params['breadcrumbs'][] = ['label' => 'Categorías-Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="account-categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_account_categories], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_account_categories], [
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
            'id_account_categories',
            [
                'attribute' => 'id_categories',
                'value' => function($model) {
                $rec = app\models\Categories::findOne($model->id_categories);
                    return $rec->name_categories;
                },
            ],
            [
                'attribute' => 'id_accounts',
                'value' => function($model) {
                    $rec = app\models\Accounts::findOne($model->id_accounts);
                    return $rec->name_accounts;
                },
            ],
        ],
    ]) ?>

</div>
