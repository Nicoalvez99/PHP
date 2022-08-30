<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni, $nombre, $correo, $celular){
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> celular = $celular;
    }

    public function __get($propiedad){
        return $this -> propiedad = $propiedad;
    }
    public function __set($propiedad, $valor){
        $this -> $propiedad = $valor;
    }
}

class Cliente extends Persona {
    private $aTrajetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __construct(){
        //parent::__construct($dni, $nombre, $correo, $celular);
        $this -> aTarjetas = array();
        $this -> bActivo = true;
        $this -> fechaAlta = date("Y/m/d");
          
    }
    public function __get($propiedad){
        return $this -> propiedad = $propiedad;
    }
    public function __set($propiedad, $valor){
        $this -> $propiedad = $valor;
    }
    public function agregarTarjeta($tarjeta){
        $this -> aTarjetas[] = $tarjeta;
    }

    public function darDeBaja($fecha){
        $this ->  fechaBaja = date_format(date_create($fecha), "d/m/Y");
        $this -> bActivo = false;
    }

    public function imprimir(){

    }
}

class Tarjeta {
    private $nombreTitular;
    private $numero;
    private $fechaDesde;
    private $fechaVto;
    private $tipo;
    private $cvv;

    const TARJETA_VISA = "Visa";
    const TARJETA_MC = "MasterCard";
    const TARJETA_AM = "Amex";
    const TARJETA_NAR = "Naranja";
    const TARJETA_CAB = "Cabal";

    public function __construct($tipo, $numero, $fechaDesde, $fechaVto, $cvv){
        
        $this -> numero = $numero;
        $this -> fechaDesde = $fechaDesde;
        $this -> fechaVto = $fechaVto;
        $this -> tipo = $tipo;
        $this -> cvv = $cvv;
    }
    
    
    public function __get($propiedad){
        return $this -> propiedad = $propiedad;
    }
    public function __set($propiedad, $valor){
        $this -> $propiedad = $valor;
    }
}


$cliente1 = new Cliente();
$cliente1 -> dni = "12789345";
$cliente1 -> nombre = "Ana Valle";
$cliente1 -> correo = "ana@gmail.com";
$cliente1 -> celular = "1545678987";

$tarjeta1 = new Tarjeta(Tarjeta::TARJETA_VISA, "723672368789273", "06/2020", "01/23", "275");
$tarjeta2 = new Tarjeta(Tarjeta::TARJETA_AM, "3782739278392897", "07/2020", "09/2024", "345");
$tarjeta3 = new Tarjeta(Tarjeta::TARJETA_MC, "8732293492732987", "01/2019", "01/2022", "423");

$cliente1 -> agregarTarjeta($tarjeta1);


print_r($cliente1);


?>