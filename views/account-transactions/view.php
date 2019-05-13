<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTransactions */

$this->title = $model->id_account_transactions;
$this->params['breadcrumbs'][] = ['label' => 'Transacción', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="account-transactions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id_account_transactions], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_account_transactions], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro de eliminar la transacción?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_account_transactions',
            'date_account_transactions',
            [
                'attribute' => 'id_accounts',
                'value' => function($model) {
                    $rec = app\models\Accounts::findOne($model->id_accounts);
                    return $rec->name_accounts;
                },
            ],
            [
                'attribute' => 'id_currency',
                'value' => function($model) {
                    $rec = app\models\Currencies::findOne($model->id_currency);
                    return $rec->iso_currency;
                },
            ],
            [
                'attribute' => 'value_account_transactions',
                'value' => function($model) {
                    return number_format($model->value_account_transactions, 2);
                },
            ],
            'concept_account_transactions',
            'document_account_transactions',
            'datetime_account_transactions',
//            'id_users',
        ],
    ]) ?>

</div>
