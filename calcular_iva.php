<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$iva = 21;
$precioSinIva = 0;
$precioConIva = 0;
$ivaCantidad = 0;
if($_POST){
    $iva = $_POST("txtSelect");
    $precioSinIva = $_POST("txtprecioSinIva");
    $precioConIva = $_POST("txtPrecioConIva");
    $ivaCantidad = $precioConIva - $precioSinIva;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Calcular el IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div class="col-12 my-2">
                        <label for="txtIva">IVA</label>
                        <select name="txtSelect" id="" class="form-control">
                            <option value="valor21">21</option>
                            <option value="valor19">19</option>
                            <option value="valor27">27</option>
                        </select>
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtPrecioConIva">Precio Con IVA:</label>
                        <input type="number" name="txtprecioConIva" id="" class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="txtPrecioSinIva">Precio sin IVA:</label>
                        <input type="number" name="txtPrecioSinIva" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">CALCULAR</button>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover">
                    <thead>
                        <th>IVA:</th>
                        <th>Precio sin IVA:</th>
                        <th>PRrecio con IVA:</th>
                        <th>IVA cantidad:</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $iva;  ?></td>
                            <td><?php echo $precioSinIva;  ?></td>
                            <td><?php echo $precioConIva;  ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>