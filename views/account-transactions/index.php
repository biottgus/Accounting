<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountTransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Account Transactions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_account_transactions',
            'datetime_account_transactions',
            'date_account_transactioins',
            'id_account',
            'value_account_transactions',
            //'id_currency',
            //'concept_account_transactions',
            //'document_account_transactions',
            //'id_users',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
