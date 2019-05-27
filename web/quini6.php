<?php
error_reporting( E_ERROR);
function verificarRepetido( $numeros, $nuevo){
	$j=0;
	for( $j=0; $j<count($numeros); $j++){
		if( $numeros[$j] == $nuevo)
			return false;
	}
	return true;
}


function sortearJugada($cantidad, $ini, $fin){
	$sorteo = Array();
	$numeroNuevo = 0;
	for( $i=0; $i<$cantidad; $i++) {
		while(1){
			$numeroNuevo = rand( $ini, $fin);
			if( verificarRepetido( $sorteo, $numeroNuevo))
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

for( $j=0; $j<$repeticiones; $j++){
	$jugada = sortearJugada( $cantidad, $ini, $fin);
	for( $k=0; $k<$cantidad; $k++){
		$salidores[$jugada[$k]]++;
	}
}

arsort( $salidores);
echo "<h1>\n";
echo "Originales: 9 | 19 | 24 | 36 | 37 | 43 |<br>";
echo "Nuevos: ";
$i=0;
foreach ($salidores as $posicion => $cantidadDeVeces) {
	//echo $posicion. ": ". $cantidadDeVeces. "  <br>\n";
	echo $posicion. " | ";
	if( $i++==$cantidad)
		break;
}
echo "<br>\n";
echo "</h1>\n";
