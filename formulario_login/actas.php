<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aNotas = array();

$aNotas[] = array("alumno" => "Ana Valle",
    "notaUno" => 7,
    "notaDos" => 8
);

$aNotas[] = array("alumno" => "Bernabe Paz",
    "notaUno" => 5,
    "notaDos" => 7
);

$aNotas[] = array("alumno" => "Sebastian Aguirre",
    "notaUno" => 6,
    "notaDos" => 9
);

$aNotas[] = array("alumno" => "Monica Ledesma",
    "notaUno" => 8,
    "notaDos" => 9
);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <th>Alumno</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Promedio</th>
                    </thead>
                    <tbody>
                        <?php 
                            for($contador = 0; $contador < count($aNotas); $contador++){ ?>
                        <tr>
                            <td><?php echo $aNotas[$contador]["alumno"]; ?></td>
                            <td><?php echo $aNotas[$contador]["notaUno"]; ?></td>
                            <td><?php echo $aNotas[$contador]["notaDos"]; ?></td>
                            <td><?php echo ($aNotas[$contador]["notaUno"] + $aNotas[$contador]["notaDos"]) / 2 ?></td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>