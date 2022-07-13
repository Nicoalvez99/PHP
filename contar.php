<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);



    $aProductos = array();
    $aProductos[] = array("nombre" => "Smart TV 45\" 4K UHD",
     "marca" => "Hitachi",
     "modelo" => "554KS220",
     "stock" => 60,
     "precio" => 8000
    );

    $aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
        "marca" => "Samsung",
        "modelo" => "A30",
        "stock" => 0,
        "precio" => 22000
    );

    $aProductos[] = array("nombre" => "Aire acondicionado Split Inverter Frio/calor Surrey 2900F",
        "marca" => "Surrey",
        "modelo" => "553AIQ1201E",
        "stock" => 5,
        "precio" => 45000
    );


    $aPacientes = array();
    $aPacientes[] = array("dni" => "33.765.012", 
        "nombre" => "Ana Acuña",
        "edad" => 45, 
        "peso" => 81.5
    );

    $aPacientes[] = array("dni" => "23.684.385",
        "nombre" => "Gonzalo Bustamante",
        "edad" => 66,
        "peso" => 79
    );

    $aPacientes[] = array("dni" => "23.684.385",
        "nombre" => "Juan Irraola",
        "edad" => 28,
        "peso" => 79
    );

    $aPacientes[] = array("dni" => "23.684.385",
        "nombre" => "Beatriz Ocampo",
        "edad" => 50,
        "peso" => 79
    );



    function contar($aArray){
        $contador = 0;
        foreach($aArray as $numero){
            $contador++;
        }
        return $contador;
    }

    echo "Cantidad de productos " . contar($aProductos);
    echo "Cantidad de pacientes " . contar($aPacientes);


?>