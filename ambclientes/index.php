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
        $dni = trim($_POST["txtDni"]);
        $nombre = trim($_POST["txtNombre"]);
        $telefono = trim($_POST["txtNumero"]);
        $correo = trim($_POST["txtCorreo"]);
            
            
            
        $aClientes[] = array("dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo
            
        );
        $_SESSION["listadoClientes"] = $aClientes;
        
        $jsonClientes = json_encode($aClientes);
        
        file_put_contents("archivo.txt", $jsonClientes);
    }
    if(isset($_POST["btnEliminar"])){
        session_destroy();
        $aClientes = array();
    }
    
        
}
//session_destroy();

if(isset($_GET["pos"])){
    $pos = $_GET["pos"];
    unset($aClientes[$pos]);
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: index.php");
}






?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abm Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Registro de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-12 my-2">
                        <label for="txtDni">DNI</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtNumero">Telefono</label>
                        <input type="number" name="txtNumero" id="txtNumero" class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtCorreo">Correo</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <p>Archivo adjunto: </p>
                        <input type="file" name="imgArchivo" id="imgArchivo" accept=".jpg, .png, .jpeg">
                    </div>
                    <button type="submit" name="btnEnviar" class="btn btn-primary">Guardar</button>
                    <button type="submit" name="btnEliminar" class="btn bg-danger">Eliminar</button>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover">
                    <thead>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($aClientes as $pos => $cliente):
                        ?>
                        <tr>
                            <td><?php  ?></td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["telefono"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td><a href="index.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>    
</body>
</html>