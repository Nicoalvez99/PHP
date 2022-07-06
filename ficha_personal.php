<?php
$nombre = 'Nicolás Alvez';
$edad = 23;
$aPeliculas = array('Legítimo rey', 'El aprendiz de brujo');


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    
    <div class="row">
        <div class="col-12 text-center mx-auto my-5">
            <h1>Ficha personal</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-5">
            <table class="table table-hover border">
                <tbody>
                    <tr>
                        <td>Fecha: </td>
                        <td><?php echo date("d/m/Y");?></td>
                    </tr>
                    <tr>
                        <td>Nombre y Apellido</td>
                        <td><?php echo $nombre;?></td>
                    </tr>
                    <tr>
                        <td>Edad:</td>
                        <td><?php echo $edad;?></td>
                    </tr>
                    <tr>
                        <td>Peliculas favoritas:</td>
                        <td><?php echo $aPeliculas[0];?><br>
                            <?php echo $aPeliculas[1];?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>