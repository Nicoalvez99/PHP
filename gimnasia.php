<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> celular = $celular;
    }
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

    public function setFichaMedica($peso, $altura, $aptoFisico){
        return $this -> $peso;
        return $this -> $altura;
        return $this -> $aptoFisico;
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


$entrenador1 = new Entrenador("87392749", "Miguel Ocampo", "miguel@gmail.com", "1144556677");


$alumno1 = new Alumno("823720323", "Juan Perez", "juanperez@gmail.com", "11767454321");
$alumno1 -> setFichaMedica(90, 178, true);
$alumno1 -> presentismo = 78;









?>