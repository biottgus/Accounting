<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorías-Cuentas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // desde aca es krakik
//        'showPageSummary' => true,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'panel' => [
            'type' => 'success',
            'footer' => true,
            'heading' => 'Categorías-Cuentas'
        ],
        'toolbar' => [
            [
                'content' =>
                Html::a('Agregar Cuenta a Categoría', ['create'], ['class' => 'btn btn-success']),
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
            'id_account_categories',
            [
                'attribute' => 'id_categories',
                'value' => function($model) {
                    return $model->categories->name_categories;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filterInputOptions' => ['placeholder' => 'Todos', 'multiple' => false],
                'filter' => ArrayHelper::map(\app\models\Categories::find()->orderBy('name_categories')->all(), 'id_categories', 'name_categories'),
            ],
            [
                'attribute' => 'id_accounts',
                'value' => function($model) {
                    return $model->accounts->name_accounts;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filterInputOptions' => ['placeholder' => 'Todos', 'multiple' => false],
                'filter' => ArrayHelper::map(\app\models\Accounts::find()->orderBy('name_accounts')->all(), 'id_accounts', 'name_accounts'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
