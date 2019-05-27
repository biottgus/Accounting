<?php

/**
 * armar query y mostrar gridview
 * 
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

/**
 * 
 * @param type $title
 * @param type $ejex
 * @param type $ejey
 * @param type $data
 * @return type
 */
function arrayToGraph($title = "", $ejex = "", $ejey = Array(), $data = Array(), $config = Array()) {
    // https://github.com/miloschuman/yii2-highcharts/tree/master/doc/examples

    $series = Array();
    $pie = Array();
    $categories = Array();
    $dataColumn = Array();

//    var_dump( $ejey);
//    var_dump( $data);
    // categorias y data de columna
    foreach ($data as $key => $record) {
        $categories[$key] = $record[$ejex];
//        var_dump( $record);
        foreach ($ejey as $dataEjeY) {
            $dataColumn[$dataEjeY['name']][$key] = $record[$dataEjeY['name']] + 0;
//            $dataColumn[$name['type']][$key] = $record[$name['type']] + 0;
        }
    }

//    var_dump( $dataColumn);
//    die;
    // armar columnas
    $i = 0;
    foreach ($dataColumn as $key => $value) {
        $total = 0;
        $record = Array();
//        $record['type'] = 'spline';
        $record['type'] = $ejey[$key]['type'];
        $record['name'] = $key;
        $record['data'] = $value;
        array_push($series, $record);

        foreach ($value as $parcial) {
            $total += $parcial;
        }

        if ($config['pie']) {
            array_push($pie, [
                'name' => $key,
                'y' => $total,
                'color' => new JsExpression("Highcharts.getOptions().colors[$i]"),
                    ]
            );
        }
        $i++;
    }

    if ($config['pie']) {
        array_push($series, [
            'type' => 'pie',
            'name' => 'Total',
            'data' => $pie,
            'center' => [100, 80],
            'size' => 100,
            'showInLegend' => false,
            'dataLabels' => [
                'enabled' => false,
            ],]
        );
    }

    // armar pie

    $graph = Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                    'themes/grid-light',
                ],
                'options' => [
                    'title' => [
                        'text' => $title,
                    ],
                    'xAxis' => [
                        'categories' => $categories,
                    ],
//                    'labels' => [
//                        'items' => [
//                            [
//                                'html' => 'Total',
//                                'style' => [
//                                    'left' => '50px',
//                                    'top' => '18px',
//                                    'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
//                                ],
//                            ],
//                        ],
//                    ],
                    'series' => $series,
                ]
    ]);

    return $graph;
}

/**
 * 
 * @param type $params
 * @return string
 */
function queryBase($params) {
    // parametros
    $desde = $params['desde'];
    $hasta = $params['hasta'];

    // armado query

    $sSQL = "SELECT a.date_account_transactions, a.value_account_transactions, 
        a.concept_account_transactions, b.name_accounts, c.name_account_types, 
        c.type_account_types, a.id_currency, d.iso_currency
        FROM account_transactions AS a
        LEFT JOIN accounts AS b ON (b.id_accounts=a.id_accounts)
        LEFT JOIN account_types AS c ON (c.id_account_types=b.id_account_types)
        LEFT JOIN currencies AS d ON (d.id_currency=a.id_currency) 
        WHERE a.date_account_transactions BETWEEN '$desde 00:00' AND '$hasta 23:59'";

    return $sSQL;
}

/**
 * 
 * @param type $params
 * @return string
 */
function queryByType($sql) {
    $sSQL = "SELECT CASE WHEN type_account_types=1 THEN 'Ingresos' else 'Egresos' END as agrupado, 
            sum(value_account_transactions) as total 
        FROM($sql) AS xx 
        GROUP BY 1
        ORDER BY 1 DESC";

    return $sSQL;
}

/**
 * 
 * @param type $sql
 * @return type
 */
function queryEgresos($sql) {
    $sSQL = "SELECT name_accounts || '('||name_account_types||')' as agrupado, sum(value_account_transactions) as total 
        FROM($sql) AS xx 
        WHERE type_account_types = -1
        GROUP BY 1 
        ORDER BY 1";

    return $sSQL;
}

/**
 * 
 * @param type $sql
 * @return type
 */
function queryTiposEgresos($sql) {
    $sSQL = "SELECT name_account_types as agrupado, sum(value_account_transactions) as total 
        FROM($sql) AS xx 
        WHERE type_account_types = -1
        GROUP BY 1 
        ORDER BY 1";

    return $sSQL;
}

/**
 * 
 * @param type $sql
 * @return type
 */
function queryIngresos($sql) {
    $sSQL = "SELECT name_accounts as agrupado, sum(value_account_transactions) as total 
        FROM($sql) AS xx 
        WHERE type_account_types = 1
        GROUP BY 1 
        ORDER BY 1";

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

$reportParams['desde'] = Html::encode($model->beginDate);
$reportParams['hasta'] = Html::encode($model->endDate);

$this->title = 'Resumen / Análisis';
$this->params['breadcrumbs'][] = $this->title;

echo "<h1>Resumen / Análisis</h1>";
echo "<p>Fechas: " . Html::encode($reportParams['desde']) . " .. " . Html::encode($reportParams['hasta']) . "</p>";

$sqlBase = queryBase($reportParams);
$sqlByType = queryByType($sqlBase);
$sqlByTiposEgresos = queryTiposEgresos($sqlBase);
$sqlByEgresos = queryEgresos($sqlBase);
$sqlByIngresos = queryIngresos($sqlBase);

//// graficar
//$data = Yii::$app->db->createCommand($sqlByType)->queryAll();
////echo reporteAnalisis($model, $data);
//echo arrayToGraph("Ingresos / Egresos", 'agrupado', [
//    'total' => [
//        'name' => 'total',
//        'type' => 'column'
//    ],
//        ], $data, ['pie' => FALSE]
//);
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-4">
            <?php
            echo "<hr>";
            echo "<h1>INGRESOS</h1>";
            $data = Yii::$app->db->createCommand($sqlByIngresos)->queryAll();
            echo reporteAnalisis($model, $data);
//echo arrayToGraph("INGRESOS", 'agrupado', [
//    'total' => [
//        'name' => 'total',
//        'type' => 'column'
//    ],
//        ], $data, ['pie' => false]
//);
            ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo "<hr>";
            echo "<h1>EGRESOS</h1>";
            $data = Yii::$app->db->createCommand($sqlByTiposEgresos)->queryAll();
            echo reporteAnalisis($model, $data);
            echo arrayToGraph("EGRESOS", 'agrupado', [
                'total' => [
                    'name' => 'total',
                    'type' => 'column'
                ],
                    ], $data, ['pie' => false]
            );
            ?>
        </div>
        <div class="col-lg-4">
            <?php
            echo "<hr>";
            echo "<h1>EGRESOS->CUENTAS</h1>";
            $data = Yii::$app->db->createCommand($sqlByEgresos)->queryAll();
            echo reporteAnalisis($model, $data);
            echo arrayToGraph("CUENTAS DE EGRESO", 'agrupado', [
                'total' => [
                    'name' => 'total',
                    'type' => 'column'
                ],
                    ], $data, ['pie' => false]
            );
            ?>
        </div>
    </div>