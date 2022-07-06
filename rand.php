<?php

    $valor = rand(1, 5);

    if ($valor == 1 || $valor == 3 || $valor == 5){
        echo "El número $valor es impar";
    } else {
        echo "El número $valor es par";
    }

?>