<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentsCalendar */

$this->title = $model->id_payments_calendar;
$this->params['breadcrumbs'][] = ['label' => 'Calendario de Pagos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payments-calendar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_payments_calendar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Pagar Ahora', ['pay', 'id' => $model->id_payments_calendar], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_payments_calendar], [
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
            'id_payments_calendar',
            'date_payments_calendar',
            [
                'attribute' => 'id_account',
                'value' => function($model) {
                    $rec = app\models\Accounts::findOne($model->id_account);
                    return $rec->name_accounts;
                },
            ],
            'value_payments_calendar',
//            'id_users',
        ],
    ]) ?>

</div>
