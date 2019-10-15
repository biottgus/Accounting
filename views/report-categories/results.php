<?php

/**
 * armar query y mostrar gridview
 * 
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\web\JsExpression;

/**
 * 
 * @param type $params
 * @return string
 */
function queryBase($params) {
    // parametros
    $id = $params['cat'];

    $sSQL = "SELECT a.id_account_transactions, a.date_account_transactions, a.id_accounts, 
	a.value_account_transactions, a.id_currency, a.concept_account_transactions, a.document_account_transactions,
	b.id_categories, b.name_categories, b.name_accounts, b.id_account_types, b.name_account_types, b.type_account_types,
	c.name_currency
        FROM account_transactions AS a
        LEFT JOIN view_account_categories AS b ON (b.id_accounts=a.id_accounts)
        LEFT JOIN currencies AS c ON (c.id_currency=a.id_currency)
        WHERE b.id_categories = '$id' 
        ";

    return $sSQL;
}

/**
 * 
 * @param type $model
 * @param type $sSQL
 * @return type
 */
function reporteAnalisis($model, $data) {
    //   Provider
    $dataProvider = new ArrayDataProvider([
        'allModels' => $data,
        'pagination' => [
            'pageSize' => count($data),
        ],
    ]);
    // grid

    $toPrint = GridView::widget([
                'dataProvider' => $dataProvider,
                'showFooter' => true,
                'columns' => [
                    [
                        'label' => 'Agrupado',
                        'attribute' => 'agrupado',
                        'footer' => 'Totales',
                        'headerOptions' => ['style' => 'text-align:center'],
                        'contentOptions' => ['style' => 'text-align:left'],
                    ],
                    [
                        'label' => 'Total',
                        'attribute' => 'total',
                        'format' => ['decimal', '2'],
                        'footer' => $model->getTotalColumn($dataProvider->models, 'total'),
                        'headerOptions' => ['style' => 'text-align:center'],
                        'contentOptions' => ['style' => 'text-align:right'],
                        'footerOptions' => ['style' => 'text-align:right; font-weight: bold;'],
                    ],
                ],
    ]);

    return $toPrint;
}

// parametros
$reportParams = Array();

$reportParams['cat'] = Html::encode($model->cat);

$this->title = 'Reporte por Categoría';
$this->params['breadcrumbs'][] = $this->title;

echo "<h1>Reporte por Categoría</h1>";

$sqlBase = queryBase($reportParams);

$data = Yii::$app->db->createCommand($sqlBase)->queryAll();
var_dump( $data);

//echo reporteAnalisis($model, $data);
