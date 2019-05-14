<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Cuentas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-types-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Tipo de Cuenta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_account_types',
            'name_account_types',
            'type_account_types',
            [
                'attribute' => 'type_account_types',
                'value' => function($model) {
                    return $model->tipoCuenta[$model->type_account_types];
                },
            'filter' => ArrayHelper::map($searchModel->filterTipoCuenta, 'id', 'value'),
            
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
