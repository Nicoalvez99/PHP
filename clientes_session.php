<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION["listadoClientes"])){
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array();
}


if($_POST){

    if(isset($_POST["btnEnviar"])){
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        $aClientes[] = array("nombre" => $nombre, "dni" => $dni, "telefono" => $telefono, "edad" => $edad);
        $_SESSION["listadoClientes"] = $aClientes;

    }

    if(isset($_POST["btnEliminar"])){
        session_destroy();
        $aClientes = array();
    }

}

if(isset($_GET["pos"])){ //pregunto si esta seteada pos del GET
    $pos = $_GET["pos"]; //creo la variable pos y la asigno al GET pos
    unset($aClientes[$pos]); //borro el pos del aClientes
    $_SESSION["listadoClientes"] = $aClientes; // lo borro de la sasion
    header("Location: clientes_session.php"); // y redirecciono a la pagina de nuevo 
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div class="col-12 my-3">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" placeholder="Ingresar Nombre y Apellido" class="form-control">
                    </div>
                    <din class="col-12 my-3">
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" placeholder="99999999" class="form-control">
                    </din>
                    <div class="col-12 my-3">
                        <label for="txtTelefono">Telefono:</label>
                        <input type="number" name="txtTelefono" id="txtTelefono" placeholder="(999) 99999999" class="form-control">
                    </div>
                    <div class="col-12 my-3">
                        <label for="txtEdad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <button type="submit" name="btnEnviar" class="btn btn-primary">Enviar</button>
                    <button type="submit" name="btnEliminar" class="btn bg-danger">Eliminar</button>

                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover">
                    <thead>
                        <th>Nombre:</th>
                        <th>DNI:</th>
                        <th>Telefono:</th>
                        <th>Edad:</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php  
                            foreach($aClientes as $pos => $cliente){ //al foreach le paso la clave $pos

                        ?>
                        <tr>
                            <td> <?php echo $cliente["nombre"]; ?> </td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["telefono"]; ?></td>
                            <td><?php echo $cliente["edad"]; ?></td>
                            <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td> <!--paso por query string el pos y le imprimo la posicion con $pos-->
                        </tr> 
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>