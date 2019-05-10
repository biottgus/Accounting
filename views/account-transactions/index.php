<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountTransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transacciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Transacción', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
            if ($model->account->accountTypes->type_account_types == 1)
                return ['class' => 'success'];
            if ($model->account->accountTypes->type_account_types == -1)
                return ['class' => 'danger'];
        },
        'columns' => [
            'id_account_transactions',
            'date_account_transactions',
            [
                'attribute' => 'id_currency',
                'value' => function($model) {
                    return $model->currency->iso_currency;
                },
                'filter' => ArrayHelper::map(app\models\Currencies::find()->orderBy('iso_currency')->All(), 'id_currency', 'iso_currency'),
            ],
            [
                'attribute' => 'id_accounts',
                'value' => function($model) {
                    return $model->account->name_accounts;
                },
                'filter' => ArrayHelper::map(app\models\Accounts::find()->orderBy('name_accounts')->All(), 'id_accounts', 'name_accounts'),
            ],
            [
                'attribute' => 'value_account_transactions',
                'format' => ['decimal', '2'],
                'value' => function($model) {
                    return $model->value_account_transactions * $model->account->accountTypes->type_account_types;
                    ;
                },
                'contentOptions' => ['style' => 'text-align:right'],
            ],
            'concept_account_transactions',
            'document_account_transactions',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
