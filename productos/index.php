<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("productos.json")) {
    $jsonProductos = file_get_contents("productos.json", true);
    $aProductos = json_decode($jsonProductos, associative: true);
} else {
    $aProductos = array();
}
if(file_exists("compra.json")){
    $jsonCompra = file_get_contents("compra.json", true);
    $aCompra = json_decode($jsonCompra, associative: true);
} else {
    $aCompra = array();
}






?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartVision</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <header class="confainer-fluid site-header sticky-top py-1" style="background-color: #202020;">

        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="index.php" aria-label="Product" style="color: #fff;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24">
                    <title>Product</title>
                    <circle cx="12" cy="12" r="10" />
                    <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
                </svg>
            </a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color: #bbb;">Inicio</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color: #bbb;">Productos</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color: #bbb;">Celulares</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color: #bbb;">Notebooks</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color: #bbb;">Soportes</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color: #bbb;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-cart-check"></i></a>
            <a class="py-2 d-none d-md-inline-block" href="productos.php" style="color: #bbb;">Sesion</a>
        </nav>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Mi Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <table class="table table-hover">
                    <thead>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        <?php if($aCompra != ""){ ?>
                            <?php foreach($aCompra as $compra){ ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </header>
    <main class="container-fluid">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 fw-normal">SmartVision</h1>
                <p class="lead fw-normal">Tu mejor opción en tecnología.</p>
                <a class="btn btn-outline-secondary" href="#">Coming soon</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
        <div class="row">
            <?php foreach ($aProductos as $id => $producto) { ?>
                <div class="col-3 my-3">
                    <div class="card" style="width: 18rem;">
                    <form action="" method="post">
                        <img src="imagenes/<?php echo $producto["imagen"]; ?>" class="img-thumbnail mx-auto width=" 200px" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto["nombre"]; ?></h5>
                            <p class="card-text"><?php echo "Modelo: " . $producto["modelo"]; ?></p>
                            <p class="card-text" style="color: green;"><?php echo "$" . number_format($producto["precio"], 2, ".", ","); ?></p>
                            
                                <button type="submit" name="btnAgregarAlCarrito" class="btn btn-primary">+ Agregar al carrito</button>
                            </form>
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