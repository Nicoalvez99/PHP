<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("productos.json")){
    $jsonProductos = file_get_contents("productos.json");
    $aProductos = json_decode($jsonProductos, true);
} else {
    $aProductos = array();
}

if($_POST){
    if(isset($_POST["btnAgregar"])){
        $nombre = $_POST["txtNombre"];
        $modelo = $_POST["txtModelo"];
        $precio = $_POST["numPrecio"];
        $stock = $_POST["numCantidad"];

        if($_FILES["producto"]["error"] === UPLOAD_ERR_OK){
            $nombreAleatorio = date("Ymdhmsi");
            $archivo_tmp = $_FILES["producto"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["producto"]["name"], PATHINFO_EXTENSION));
            if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }

        $aProductos[] = array("imagen" => $nombreImagen,
                            "nombre" => $nombre,
                            "modelo" => $modelo,
                            "precio" => $precio,
                            "stock" => $stock
        );

        $jsonProductos = json_encode($aProductos);
        file_put_contents("productos.json", $jsonProductos);


    }
}











?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <header class="confainer-fluid">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Articulos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productos.php">Productos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid">
        <div class="row">
            <div class="col-12 my-5 text-center">
                <h3>Administración y edición de productos</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6 px-5">
                <h3>¡Agregá uno nuevo!</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-12 my-2">
                        <p>Imagen del Producto</p>
                        <input type="file" name="producto" class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" name="txtNombre" required class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtModelo">Modelo:</label>
                        <input type="text" name="txtModelo" class="form-control" required>
                    </div>
                    <div class="col-12 my-2">
                        <label for="numPrecio">Precio:</label>
                        <input type="number" name="numPrecio" class="form-control" required>
                    </div>
                    <div class="col-12 my-2">
                        <label for="numCantidad">Stock</label>
                        <input type="number" name="numCantidad" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5" name="btnAgregar">Nuevo Producto</button>
                </form>
            </div>
            <div class="col-6 px-5">
                <h3>Editá un producto</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-12 my-2">
                        <p>Imagen del Producto</p>
                        <input type="file" class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" name="txtNombre" required class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtModelo">Modelo:</label>
                        <input type="text" name="txtModelo" class="form-control" required>
                    </div>
                    <div class="col-12 my-2">
                        <label for="numPrecio">Precio:</label>
                        <input type="number" name="numPrecio" class="form-control" required>
                    </div>
                    <div class="col-12 my-2">
                        <label for="numCantidad">Stock</label>
                        <input type="number" name="numCantidad" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5" name="btnEditar">Editar Producto</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-5 text-center">
                <h3>Stock de productos</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciónes</th>
                    </thead>
                    <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>