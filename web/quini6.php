<?php

error_reporting(E_ERROR);
$estadisticas = [28,
    13,
    14,
    9,
    43,
    37,
];

function verificarRepetido($numeros, $nuevo) {
    $j = 0;
    for ($j = 0; $j < count($numeros); $j++) {
        if ($numeros[$j] == $nuevo)
            return false;
    }
    return true;
}

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
echo "<h1>Estadísticas: </h1>\n";
echo "<h1>\n";
for( $i=0; $i<count($estadisticas); $i++){
    echo $estadisticas[$i]. " - ";
}
echo "<br>\n";
echo "</h1>\n";

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
