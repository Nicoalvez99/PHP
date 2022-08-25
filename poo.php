<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function setDni($dni){ $this -> dni = $dni; }
    public function getDni(){ return $this -> dni; }

    public function setNombre($nombre){ $this -> nombre = $nombre; }
    public function getNombre(){ return $this -> nombre; }

    public function setEdad($edad){ $this -> edad = $edad; }
    public function getEdad(){ return $this -> edad; }

    public function setNacionalidad($nacionalidad){ $this -> nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this -> nacionalidad; }

    public function imprimir(){

    }
}



class Alumno extends Persona {
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __construct(){
        $this -> notaPortfolio = 0.0;
        $this -> notaPhp = 0.0;
        $this -> notaProyecto = 0.0;
    }
    
    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        return $this -> $propiedad = $valor;
    }
    
        
    

    public function imprimir(){
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Edad: " . $this -> edad . "<br>";
        echo "DNI: " . $this -> dni . "<br>";
        echo "Nacionalidad: " . $this -> nacionalidad . "<br>";
    }
    public function calcularPromedio(){
        echo "Su Promedio es: " . number_format(($this -> notaPhp + $this -> notaPortfolio + $this -> notaProyecto) / 3, 2, ".", ",") . "<br>";
    }
    
}

class Docente extends Persona {
    private $especialidad;

    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Bases de datos";

    public function __construct($dni, $nombre, $especialidad){
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> especialidad = $especialidad;
    }

    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        return $this -> $propiedad = $valor;
    }

    public function imprimir(){
        echo "DNI: " . $this -> dni . "<br>";
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Edad: " . $this -> edad . "<br>";
        echo "Nacionalidad: " . $this -> nacionalidad . "<br>";
        echo "Especialidad: " . $this -> especialidad . "<br>";
    }

    public function imprimirEspecialidadesHabilidades(){
        echo "Las habilidades y especialidades para un docente son: <br>";
        echo self::ESPECIALIDAD_WP . "<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_BBDD . "<br>";
    }
    

    
   
}

$alumno1 = new Alumno();
$alumno1 -> setDni("41919119");
$alumno1 -> setNombre("Nicolás");
$alumno1 -> setEdad(23);
$alumno1 -> notaPhp = 8;
$alumno1 -> notaPortfolio = 10;
$alumno1 -> notaProyecto = 7;
$alumno1 -> nacionalidad = "Argentino";
$alumno1 -> legajo = "Hola";
$alumno1 -> imprimir();
$alumno1 -> calcularPromedio();

$alumno2 = new Alumno();



$docente1 = new Docente("38729370", "Juan Perez", Docente::ESPECIALIDAD_ECO);
$docente1 -> imprimir();












?>