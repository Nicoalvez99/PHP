<?php

$aNotas = array(8, 4, 5, 3, 9, 1);

function promediar($aNumeros){
    $numero = 0;
    foreach($aNumeros as $numero){
        $numero += $numero;
    }
    return $numero / count($aNumeros);
}

echo "El promedio es: " . promediar($aNotas);
?>