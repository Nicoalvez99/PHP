<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aNotas = array(8, 4, 5, 3, 9, 1);

$aSueldo = array(800, 400, 500, 300, 900, 100, 900, 1800);

function maximo($aVector){
    $valorMaximo = 0; // empieza con el valor de $valorMaximo en 0
    foreach($aVector as $aNumero){ // asigna cada elemento del array a la variable $aNumeros
        if($aNumero > $valorMaximo){ // pregunta si el numero que entra de la variable es mayor al valor maximo
           $valorMaximo = $aNumero;// si es asi lo iguala y sigue.
        }
    }
    return $valorMaximo;// retorna el valor maximo
}
echo "El sueldo maximo es: " . maximo($aSueldo);


?>