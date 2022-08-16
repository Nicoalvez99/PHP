<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function imprimir(){

    }
}



class Alumno extends Persona {
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct(){
        $this -> notaPortfolio = 0.0;
        $this -> notaPhp = 0.0;
        $this -> notaProyecto = 0.0;
    }
    
    public function imprimir(){
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Edad: " . $this -> edad . "<br>";
        echo "DNI: " . $this -> dni . "<br>";
        echo "Nacionalidad: " . $this -> nacionalidad . "<br>";
    }
    public function calcularPromedio(){
        echo "Su Promedio es: " . number_format(($this -> notaPhp + $this -> notaPortfolio + $this -> notaProyecto) / 3, 2, ".", ",");
    }
    
}

$alumno1 = new Alumno();
$alumno1 -> dni = 41919119;
$alumno1 -> nombre = "Nicolás";
$alumno1 -> edad = 23;
$alumno1 -> notaPhp = 8;
$alumno1 -> notaPortfolio = 10;
$alumno1 -> notaProyecto = 7;
$alumno1 -> nacionalidad = "Argentino";
$alumno1 -> legajo = "Hola";
$alumno1 -> imprimir();
$alumno1 -> calcularPromedio();






class Docente extends Persona {
    public $especialidad;
    
    public function imprimirEspecialidadesHabilidades(){
        
    }
}

$docente1 = new Docente();
$docente1 -> dni = 16457342;
$docente1 -> nombre = "Karina";
$docente1 -> edad = 33;
$docente1 -> nacionalidad = "Argentina";
$docente1 -> especialidad = "Historia";
$docente1 -> imprimirEspecialidadesHabilidades();











?>