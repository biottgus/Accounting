<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountCategories */

$this->title = 'Modificar Categoría de Cuenta: ' . $model->id_account_categories;
$this->params['breadcrumbs'][] = ['label' => 'Categorías-Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_account_categories, 'url' => ['view', 'id' => $model->id_account_categories]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
