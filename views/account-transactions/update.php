<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTransactions */

$this->title = 'Actualizar Transacción: ' . $model->id_account_transactions;
$this->params['breadcrumbs'][] = ['label' => 'Transacción', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_account_transactions, 'url' => ['view', 'id' => $model->id_account_transactions]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-transactions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
