<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array("nombre" => "Smart TV 45\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS220",
    "stock" => 60,
    "precio" => 20000
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

//print_r($aProductos);
//exit;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Lista de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Listado de productos</h1>
            </div>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <th>Nombres</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        <?php 
                            $precio = 0;
                            for ($contador = 0; $contador < count($aProductos); $contador++) {
                                $precio += $aProductos[$contador]["precio"];
                        ?>
                        <tr>
                            <td><?php echo $aProductos[$contador]["nombre"];?></td>
                            <td><?php echo $aProductos[$contador]["marca"];?></td>
                            <td><?php echo $aProductos[$contador]["modelo"];?></td>
                            <td><?php echo $aProductos[$contador]["stock"] == 0? "No hay stock" : ($aProductos[0]["stock"] > 1 && $aProductos[0]["stock"] <= 10 ? "Poco stock" : "Hay stock" ); ?></td>
                            <td><?php echo $aProductos[$contador]["precio"];?></td>
                            <td><button class="btn btn-primary">Comprar</button></td>
                        </tr>
                        
                        <?php
                         } ?>
                    </tbody>
                </table>
               <?php 
                echo "el sub total es: $precio";
               
               ?>
            </div>
        </div>
</main>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>