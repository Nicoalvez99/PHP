<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("productos.json")){
    $jsonProductos = file_get_contents("productos.json", true);
    $aProductos = json_decode($jsonProductos, associative: true);
} else {
    $aProductos = array();
}






?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
            <?php foreach($aProductos as $producto){ ?>
            <div class="col-3 my-3">
                <div class="card" style="width: 18rem;">
                    <img src="imagenes/<?php echo $producto["imagen"]; ?>" class="img-thumbnail mx-auto width="200px" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto["nombre"]; ?></h5>
                        <p class="card-text"><?php echo "Modelo: " . $producto["modelo"]; ?></p>
                        <p class="card-text" style="color: green;"><?php echo "$" . number_format($producto["precio"], 2, ".", ","); ?></p>
                        <button type="submit" class="btn btn-primary">+ Agregar al carrito</button>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>