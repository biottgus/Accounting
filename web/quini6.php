<?php
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');
//
//require __DIR__ . '/../vendor/autoload.php';
//require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
//
//$config = require __DIR__ . '/../config/web.php';
//(new yii\web\Application($config))->runAction('/site/none');
//
///**
// * para usar el yii database y el gridview
// */
//use yii\grid\GridView;
//use yii\data\ArrayDataProvider;
//
//
//
//$data = Yii::$app->db->createCommand("SELECT name_accounts as agrupado, sum(value_account_transactions) as total 
//        FROM(SELECT a.date_account_transactions, a.value_account_transactions, 
//        a.concept_account_transactions, b.name_accounts, c.name_account_types, 
//        c.type_account_types, a.id_currency, d.iso_currency
//        FROM account_transactions AS a
//        LEFT JOIN accounts AS b ON (b.id_accounts=a.id_accounts)
//        LEFT JOIN account_types AS c ON (c.id_account_types=b.id_account_types)
//        LEFT JOIN currencies AS d ON (d.id_currency=a.id_currency) 
//        ) AS xx 
//        WHERE type_account_types = 1
//        GROUP BY 1 
//        ORDER BY 1")->queryAll();
//
//$dataProvider = new ArrayDataProvider([
//    'allModels' => $data,
//    'pagination' => [
//        'pageSize' => count($data),
//    ],
//]);
//echo GridView::widget([
//                'dataProvider' => $dataProvider,
//                'showFooter' => true,
//                'columns' => [
//                    [
//                        'label' => 'Agrupado',
//                        'attribute' => 'agrupado',
//                        'footer' => 'Totales',
//                        'headerOptions' => ['style' => 'text-align:center'],
//                        'contentOptions' => ['style' => 'text-align:left'],
//                    ],
//                    [
//                        'label' => 'Total',
//                        'attribute' => 'total',
//                        'format' => ['decimal', '2'],
//                        'headerOptions' => ['style' => 'text-align:center'],
//                        'contentOptions' => ['style' => 'text-align:right'],
//                        'footerOptions' => ['style' => 'text-align:right; font-weight: bold;'],
//                    ],
//                ],
//    ]);
//
?>
<?php
error_reporting(E_ERROR);
$estadisticas = [28,
    13,
    14,
    9,
    43,
    37,
];

/**
 * 
 * @param type $numeros
 * @param type $nuevo
 * @return boolean
 */
function verificarRepetido($numeros, $nuevo) {
    $j = 0;
    for ($j = 0; $j < count($numeros); $j++) {
        if ($numeros[$j] == $nuevo)
            return false;
    }
    return true;
}

/**
 * 
 * @param type $cantidad
 * @param type $ini
 * @param type $fin
 * @return type
 */
function sortearJugada($cantidad, $ini, $fin) {
    $sorteo = Array();
    $numeroNuevo = 0;
    for ($i = 0; $i < $cantidad; $i++) {
        while (1) {
            $numeroNuevo = rand($ini, $fin);
            if (verificarRepetido($sorteo, $numeroNuevo))
                break;
        }
        $sorteo[$i] = $numeroNuevo;
    }
    return $sorteo;
}

$repeticiones = 100000;
$salidores = Array();
$ini = 0;
$fin = 45;
$cantidad = 6;

for ($j = 0; $j < $repeticiones; $j++) {
    $jugada = sortearJugada($cantidad, $ini, $fin);
    for ($k = 0; $k < $cantidad; $k++) {
        $salidores[$jugada[$k]] ++;
    }
}

arsort($salidores);
//echo "<h1>Estadísticas: </h1>\n";
//echo "<h1>\n";
//for ($i = 0; $i < count($estadisticas); $i++) {
//    echo $estadisticas[$i] . " - ";
//}
//echo "<br>\n";
//echo "</h1>\n";

echo "<h1>Números ganadores: </h1>\n";
echo "<h1>\n";
$i = 0;
foreach ($salidores as $posicion => $cantidadDeVeces) {
    echo $posicion;
    if ($i++ == $cantidad - 1)
        break;
    echo " - ";
}
echo "<br>\n";
echo "</h1>\n";
?>