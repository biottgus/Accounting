<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\daterange\DateRangePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountTransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transacciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'rowOptions' => function($model) {
            if ($model->account->accountTypes->type_account_types == 1)
                return ['class' => 'success'];
            if ($model->account->accountTypes->type_account_types == -1)
                return ['class' => 'danger'];
        },
        // desde aca es krakik
//        'showPageSummary' => true,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'panel' => [
            'type' => 'success',
            'footer' => true,
            'heading' => 'Transacciones'
        ],
        'toolbar' => [
            [
                'content' =>
                Html::a('Agregar Transacción', ['create'], ['class' => 'btn btn-success']),
                'options' => ['class' => 'btn-group mr-2']
            ],
            '{export}',
        ],
        'floatHeader' => false,
        'condensed' => true,
        'responsive' => true,
        'responsiveWrap' => false,
//        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        // desde aca es krakik
        'columns' => [
            'id_account_transactions',
            [
                'attribute' => 'date_account_transactions',
                'value' => function($model) {
                    return $model->date_account_transactions;
                },
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date_account_transactions',
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'Y-m-d'
                        ],
                    ],
                ]),
            ],
            [
                'attribute' => 'id_currency',
                'value' => function($model) {
                    return $model->currency->iso_currency;
                },
                'filter' => ArrayHelper::map(app\models\Currencies::find()->orderBy('iso_currency')->All(), 'id_currency', 'iso_currency'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterInputOptions' => ['placeholder' => 'Todos', 'multiple' => false],
            ],
            [
                'attribute' => 'id_account_types',
                'label' => 'Tipo',
                'value' => function($model) {
                    return $model->account->accountTypes->name_account_types;
                    ;
                },
                'filter' => ArrayHelper::map(app\models\AccountTypes::find()->orderBy('name_account_types')->All(), 'id_account_types', 'name_account_types'),
            ],
            [
                'attribute' => 'id_accounts',
                'value' => function($model) {
                    return $model->account->name_accounts;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filterInputOptions' => ['placeholder' => 'Todos', 'multiple' => false],
                'filter' => ArrayHelper::map(\app\models\Accounts::find()->orderBy('name_accounts')->all(), 'id_accounts', 'name_accounts'),
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'value_account_transactions',
                'hAlign' => 'right',
                'vAlign' => 'top',
                'format' => ['decimal', 2],
                'footer' => app\models\AccountTransactions::getTotal($dataProvider->models, 'value_account_transactions'),
                'value' => function($model) {
                    $value = $model->value_account_transactions * $model->account->accountTypes->type_account_types;
                    return $value;
                    ;
                },
                'editableOptions' => [
//                    'header' => 'Texto SMS',
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'formOptions' => [
                        'action' => Url::to(['update-row'])
                    ],
                ],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'concept_account_transactions',
                'hAlign' => 'left',
                'vAlign' => 'top',
                'editableOptions' => [
//                    'header' => 'Texto SMS',
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'formOptions' => [
                        'action' => Url::to(['update-row'])
                    ],
                ],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'document_account_transactions',
                'hAlign' => 'left',
                'vAlign' => 'top',
                'editableOptions' => [
//                    'header' => 'Texto SMS',
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'formOptions' => [
                        'action' => Url::to(['update-row'])
                    ],
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'header' => 'Actions',
                'template' => '{update} {delete}',
                'visibleButtons' => true,
            ],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
