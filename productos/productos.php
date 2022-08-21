<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("productos.json")) {
    $jsonProductos = file_get_contents("productos.json");
    $aProductos = json_decode($jsonProductos, true);
} else {
    $aProductos = array();
}

$id = isset($_GET["id"]) && $_GET["id"] >= 0 ? $_GET["id"] : "";

if ($_POST) {
    if (isset($_POST["btnAgregar"])) {
        $nombre = $_POST["txtNombre"];
        $modelo = $_POST["txtModelo"];
        $precio = $_POST["numPrecio"];
        $stock = $_POST["numCantidad"];


        if ($_FILES["producto"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi");
            $archivo_tmp = $_FILES["producto"]["tmp_name"];
            $extension = strtolower(pathinfo($_FILES["producto"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }

        $aProductos[] = array(
            "imagen" => $nombreImagen,
            "nombre" => $nombre,
            "modelo" => $modelo,
            "precio" => $precio,
            "stock" => $stock
        );

        $jsonProductos = json_encode($aProductos);
        file_put_contents("productos.json", $jsonProductos);
    }
    if(isset($_POST["btnEditar"])){
        $nombre = $_POST["txtNombre"];
        $modelo = $_POST["txtModelo"];
        $precio = $_POST["numPrecio"];
        $stock = $_POST["numCantidad"];

        if ($id >= 0) {
            if ($_FILES["producto"]["error"] === UPLOAD_ERR_OK) {
                $nombreAleatorio = date("Ymdhmsi");
                $archivo_tmp = $_FILES["producto"]["tmp_name"];
                $extension = strtolower(pathinfo($_FILES["producto"]["name"], PATHINFO_EXTENSION));
                if ($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
                    $nombreImagen = "$nombreAleatorio.$extension";
                    move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
                }
                if ($aProductos[$id]["imagen"] !== "" && file_exists("imagenes/" . $aProductos[$id]["imagen"])) {
                    unlink("imagenes/" . $aProductos[$id]["imagen"]);
                }
            }

            $aProductos[$id] = array(
                "nombre" => $nombre,
                "modelo" => $modelo,
                "precio" => $precio,
                "stock" => $stock
            );
            $jsonProductos = json_encode($aProductos);
            file_put_contents("productos.json", $jsonProductos);
        }
    }
}

if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aProductos[$id]);
    $jsonProductos = json_encode($aProductos);
    file_put_contents("productos.json", $jsonProductos);
}







?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <div class="spnContainer" id="spin">
            <div class="spinner-border text-primary spin" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
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
                        <input type="file" name="producto" accept=".jpg, .png, .jpeg" class="form-control">
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
                        <input type="file" class="form-control" name="producto" accept=".jpg, .png, .jpeg" required>
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtNombre">Nombre: </label>
                        <input type="text" name="txtNombre" required class="form-control" value="<?php echo isset($aProductos[$id]) ? $aProductos[$id]["nombre"] : "";  ?>">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtModelo">Modelo:</label>
                        <input type="text" name="txtModelo" class="form-control" required value="<?php echo isset($aProductos[$id]) ? $aProductos[$id]["modelo"] : "";  ?>">
                    </div>
                    <div class="col-12 my-2">
                        <label for="numPrecio">Precio:</label>
                        <input type="number" name="numPrecio" class="form-control" required value="<?php echo isset($aProductos[$id]) ? $aProductos[$id]["precio"] : "";  ?>">
                    </div>
                    <div class="col-12 my-2">
                        <label for="numCantidad">Stock</label>
                        <input type="number" name="numCantidad" class="form-control" required value="<?php echo isset($aProductos[$id]) ? $aProductos[$id]["stock"] : "";  ?>">
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
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciónes</th>
                    </thead>
                    <tbody>
                        <?php foreach ($aProductos as $id => $producto) {  ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><img src="imagenes/<?php echo $producto["imagen"]; ?>" alt="<?php echo $producto["nombre"]; ?>" width="100px" class="img-thumbnail"></td>
                                <td><?php echo $producto["nombre"]; ?></td>
                                <td><?php echo $producto["modelo"]; ?></td>
                                <td><?php echo "$" . number_format($producto["precio"], 2, ".", ","); ?></td>
                                <td><?php echo $producto["stock"]; ?></td>
                                <td><a href="productos.php?id=<?php echo $id; ?>&do=editar"><i class="bi bi-pencil"></i></a></td>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Desea eliminar el producto?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                <button type="button" class="btn btn-primary"><a href="productos.php?id=<?php echo $id; ?>&do=eliminar" style="color: #fff;">Eliminar</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>



    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>