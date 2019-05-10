<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTransactions */

$this->title = 'Agregar Transacción';
$this->params['breadcrumbs'][] = ['label' => 'Agregar Transacción', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-transactions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
