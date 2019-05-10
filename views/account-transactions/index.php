<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountTransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<?= Html::a('Regitrar transacción', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_account_transactions',
            'date_account_transactioins',
            [
                'attribute' => 'id_account',
                'value' => function($model) {
                    return $model->account->name_accounts;
                },
                'filter' => ArrayHelper::map(app\models\Accounts::find()->orderBy('name_accounts')->All(), 'id_accounts', 'name_accounts'),
            ],
            [
                'attribute' => 'id_currency',
                'value' => function($model) {
                    return $model->currency->iso_currency;
                },
                'filter' => ArrayHelper::map(app\models\Currencies::find()->orderBy('name_currency')->All(), 'id_currency', 'iso_currency'),
            ],
            'value_account_transactions',
            'concept_account_transactions',
            'document_account_transactions',
            //'id_users',
//            'datetime_account_transactions',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
