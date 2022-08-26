<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $telefono;
    

    public function __construct(){
        $this -> descuento = 0.0;
    }
    
    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this -> $propiedad = $valor;
    }
    

    public function imprimir(){
        echo "Dni: " . $this -> dni . "<br>";
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Correo: " . $this -> correo . "<br>";
        echo "Telefono: " . $this -> telefono . "<br><br>"; 
    }
}

class Producto {
    protected $codigo;
    protected $nombre;
    protected $descripcion;
    

    public function __construct()
    {
        $this -> precio = 0.0;
        $this -> iva = 0.0;
    }
    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this -> $propiedad = $valor;
    }
    
    
    public function imprimir(){
        echo "Codigo: " . $this -> codigo . "<br>";
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Precio: " . $this -> precio . "<br>";
        echo "Descripcion: " . $this -> descripcion . "<br>";
        echo "Iva: " . $this -> iva . "<br>";
        echo "Total: " . $this -> precio . "<br><br>";

    }
}


class Carrito{
    protected $cliente;
    

    public function __construct()
    {
        $this -> aProductos = array();
        $this -> subTotal = 0.0;
        $this -> total = 0.0;
    }
    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this -> $propiedad = $valor;
    }

    public function cargarProducto($producto){
        $this -> aProductos[] = $producto;
    }
    public function imprimirTicket(){
        echo "<table class='table table-hover border' style='width: 400px;'>";
        echo "<tr><th colspan='2' class='text-center'>ECO MARKET</th></tr>
                <tr>
                    <th>" . date("Y/m/d H:i:s") . "</th>
                <tr>
                    <th>DNI</th>
                    <td>" . $this -> cliente -> dni . "</td>
                </tr>
                <tr>
                    <th>Nombre: </th>
                    <td>" . $this -> cliente -> nombre . "</td>
                </tr>
                <tr>
                    <th colspan='2'>Productos: </th>
                    <td>";
                        foreach($this -> aProductos as $producto){
                            echo "<tr>
                                        <td>" . $producto -> nombre . "</td>
                                        <td>" . number_format($producto -> precio, 2, ".", ",") . "</td>
                                </tr>";
                            $this -> subTotal += $producto -> precio;
                            $this -> total += $producto -> precio * ($producto -> iva / 100 + 1);
                        }
                    echo "</table>";

    }



}


$cliente1 = new Cliente();
$cliente1 -> dni = "78676976";
$cliente1 -> nombre = "Bernabé";
$cliente1 -> correo = "bernabe@gmail.com";
$cliente1 -> telefono = "+541557351589";
$cliente1 -> descuento = 0.05;
//print_r($cliente1);
//$cliente1 -> imprimir();

$producto1 = new Producto();
$producto1 -> codigo = "8374297";
$producto1 -> nombre = "Heladera Wirpool";
$producto1 -> descripcion = "Esta es una heladera";
$producto1 -> precio = 78000;
$producto1 -> iva = 10.5;
//$producto1 -> imprimir();

$carrito = new Carrito();
$carrito -> cliente = $cliente1;
//print_r($carrito);
$carrito -> cargarProducto($producto1);
//print_r($carrito);
$carrito -> imprimirTicket();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    
</body>
</html>