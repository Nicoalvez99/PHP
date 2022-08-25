<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $telefono;
    protected $descuento = 0.0;

    public function setDni($dni){ $this -> dni = $dni;}
    public function getDni(){ return $this -> dni; }

    public function setNombre($nombre){ $this -> nombre = $nombre; }
    public function getNombre(){ return $this -> nombre; }

    public function setCorreo($correo){ $this -> correo = $correo; }
    public function getCorreo(){ return $this -> correo; }

    public function setTelefono($telefono){ $this -> telefono = $telefono; }
    public function getTelefono(){ return $this -> telefono; }

    public function imprimir(){

    }
}

class Producto {
    protected $codigo;
    protected $nombre;
    protected $precio = 0.0;
    protected $descripcion;
    protected $iva = 0.0;

    public function setCodigo($codigo){ $this -> codigo = $codigo; }
    public function getCodigo(){ return $this -> codigo; }

    public function setNombre($nombre){ $this -> nombre = $nombre; }
    public function getNombre(){ return $this -> nombre; }

    public function setPrecio($precio){ $this -> precio = $precio; }
    public function getPrecio(){ return $this -> precio; }

    public function setDescripcion($descripcion){ $this -> descripcion = $descripcion; }
    public function getDescripcion(){ return $this -> descripcion; }

    public function setIva($iva){ $this -> iva = $iva; }
    public function getIva(){ return $this -> iva; }
    
    public function imprimir(){
        echo "Codigo: " . $this -> codigo . "<br>";
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Precio: " . $this -> precio . "<br>";
        echo "Descripcion: " . $this -> descripcion . "<br>";

    }
}


class Carrito{
    protected $cliente;
    protected $aProductos = array();
    protected $subTotal = 0.0;
    protected $total = 0.0;

    public function setCliente($cliente){ $this -> cliente = $cliente; }
    public function getCliente(){ return $this -> cliente; }

    public function setaProductos($aProductos){ $this -> aProductos = $aProductos; }
    public function getaProductos(){ return $this -> aProductos; }

    public function setSubTotalo($subTotal){ $this -> subTotal = $subTotal; }
    public function getSubTotal(){ return $this -> subTotal; }

    public function setTotal($total){ $this -> total = $total; }
    public function getTotal(){ return $this -> total; }

    public function cargarProducto(){

    }
    public function imprimirTicket(){
        
    }



}












?>