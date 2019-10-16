<?php

/**
 * armar query y mostrar gridview
 * 
 */
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

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
	c.iso_currency
        FROM account_transactions AS a
        LEFT JOIN view_account_categories AS b ON (b.id_accounts=a.id_accounts)
        LEFT JOIN currencies AS c ON (c.id_currency=a.id_currency)
        WHERE b.id_categories = '$id' 
        ORDER BY b.name_categories, b.name_accounts, a.date_account_transactions, a.id_accounts";

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
                // desde aca es krakik
                'pjax' => true,
                'striped' => true,
                'hover' => true,
                'panel' => [
                    'type' => 'success',
                    'footer' => true,
                    'heading' => 'Transacciones'
                ],
                'floatHeader' => false,
                'condensed' => true,
                'responsive' => true,
                'responsiveWrap' => false,
                // desde aca es krakik
                'columns' => [
                    [
                        'label' => 'Categoría',
                        'attribute' => 'name_categories',
                        'pageSummary' => 'Total',
//                        'pageSummaryOptions' => ['colspan' => 1],
                        'group' => true,
                        'groupedRow' => true,
                    ],
                    [
                        'label' => 'Tipo',
                        'attribute' => 'name_account_types',
                        'group' => true,
                    ],
                    [
                        'label' => 'Cuenta',
                        'attribute' => 'name_accounts',
                        'group' => true,
                    ],
                    [
                        'label' => 'Fecha',
                        'attribute' => 'date_account_transactions',
                    ],
                    [
                        'label' => 'ID',
                        'attribute' => 'id_account_transactions',
                        'footer' => 'Totales',
                        'headerOptions' => ['style' => 'text-align:center'],
                        'contentOptions' => ['style' => 'text-align:left'],
                    ],
                    [
                        'label' => 'Detalle',
                        'attribute' => 'concept_account_transactions',
                    ],
                    [
                        'label' => 'Moneda',
                        'attribute' => 'iso_currency',
                    ],
                    [
                        'label' => 'Importe',
                        'attribute' => 'value_account_transactions',
                        'format' => ['decimal', '2'],
//                        'footer' => $model->getTotalColumn($dataProvider->models, 'total'),
                        'headerOptions' => ['style' => 'text-align:center'],
                        'contentOptions' => ['style' => 'text-align:right'],
                        'footerOptions' => ['style' => 'text-align:right; font-weight: bold;'],
                        'value' => function($dataProvider) {
                            $value = $dataProvider['value_account_transactions'] * $dataProvider['type_account_types'];
                            return $value;
                            ;
                        },
                        'hAlign' => 'right',
                        'vAlign' => 'middle',
                        'pageSummary' => true,
                    ],
                ],
                'showPageSummary' => true,
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
echo reporteAnalisis($model, $data);
