<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Dessarrola una funcion que reciba un array o un string, en un mismo parámetro, e imprima el contenido de la variable
//en un archivo de la mejor manera que creas conveniente

function print_f($variable){
    if(is_array($variable)){
        //si es un array lo recorro y y guardo el contenido en el archivo "datos.txt"
        $archivo = fopen('datos.txt', 'a+');

        foreach($variable as $num){
            fwrite($archivo, $num);  
        }
        fclose($archivo); 
        
    } else {
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
}

//Uso
$aNotas = array(5, 8, 9, 7, 10);
$msg = "Este es un mensaje";
print_f($aNotas);
print_f($msg);





?>