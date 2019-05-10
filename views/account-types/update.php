<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountTypes */

$this->title = 'Update Account Types: ' . $model->id_account_types;
$this->params['breadcrumbs'][] = ['label' => 'Account Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_account_types, 'url' => ['view', 'id' => $model->id_account_types]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
