<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CurrenciesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monedas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currencies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<?= Html::a('Agregar Moneda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_currency',
            'name_currency',
            'iso_currency',
            [
                'attribute' => 'default_currency',
                'value' => function($model) {
                    return $model->defaultCurrency[$model->default_currency];
                },
                'filter' => ArrayHelper::map($searchModel->filterDefaultCurrency, 'id', 'value'),
            ],
            'exchange_currency',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
