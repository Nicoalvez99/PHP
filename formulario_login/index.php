<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {
    header("Location: acceso_confirmado.php");
} else {
    echo "Validar";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php 
                    
                ?>
                <div class="alert alert-danger" role="alert">
                    Valido para usuarios registrados.
                </div>
            </div>
            <div class="col-6">
                <form action="" method="post">
                    <div class="col-12 my-3">
                        <label for="txtUsuario">Usuario</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                    </div>
                    <div class="col-12 my-3">
                        <label for="txtClave">Clave</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control">
                    </div>
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>