<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountCategories */

$this->title = 'Agregar Cuenta a Categoría';
$this->params['breadcrumbs'][] = ['label' => 'Categorías-Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
