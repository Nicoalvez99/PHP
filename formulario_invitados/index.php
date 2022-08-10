<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$read = fopen("invitados.csv", 'r');

$aDni = fgetcsv($read);
if($_POST){
    if($_POST["btnInvitado"]){
        $documento = $_POST["txtDocumento"];
        print_r($documento);
        echo in_array($documento, $aDni)? "Bienvenido" : "DNI no registrado";
    }

}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de invitados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h1>Lista de invitados</h1>
            </div>
            <div class="col-12 my-3">
                <p>Complete el siguiente formulario:</p>
            </div>
        </div>
        <?php  ?>
        <div class="row">
            <form action="" method="post">
                <div class="col-6 my-3">
                    <label for="txtDocumento">Ingrese su DNI:</label>
                    <input type="text" name="txtDocumento" class="form-control">
                </div>
                <button type="submit" name="btnInvitado" class="btn btn-primary">Verificar invitado</button>
                
                <div class="col-6 my-3">
                    <label for="txtCodigo">Ingrese el código secreto para el pase VIP</label>
                    <input type="text" name="txtCodigo" class="form-control">
                </div>
                <button type="submit" name="btnCodigo" class="btn btn-primary">Verificar código</button>
            </form>
        </div>
    </main>

</body>
</html>