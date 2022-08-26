<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function setDni($dni){ $this -> dni = $dni;}
    public function getDni(){ return $this -> dni; }

    public function setNombre($nombre){ $this -> nombre = $nombre;}
    public function getNombre(){ return $this -> nombre; }

    public function setCorreo($correo){ $this -> correo = $correo;}
    public function getCorreo(){ return $this -> correo; }

    public function setCelular($celular){ $this -> celular = $celular;}
    public function getCelular(){ return $this -> celular; }
}




class Alumno extends Persona {
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;

    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this -> $propiedad = $valor;
    }

    public function __construct()
    {
        $this -> peso = 0.0;
        $this -> altura = 0.0;
        $this -> aptoFisico = false;
        $this -> presentismo = 0.0;
    }

    public function setFichaMedica(){

    }
}




class Entrenador extends Persona {
    private $aClases;

    public function __construct()
    {
        $this -> aClases = array();
    }

    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this -> $propiedad = $valor;
    }

    public function asignarClase(){

    }
}




class Clase {
    private $nombre;
    private $entrenador;
    private $aAlumnos;
    
    public function __construct()
    {
        $this -> aAlumnos = array();
    }

    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this -> $propiedad = $valor;
    }

    public function asignarEntrenador(){

    }
    public function inscribirAlumno(){

    }
    public function imprimirListado(){

    }
}


$entrenador1 = new Entrenador ("87392749", "Miguel Ocampo", "miguel@gmail.com", "1144556677");

print_r($entrenador1);






?>