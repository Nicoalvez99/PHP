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

    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this -> $propiedad = $valor;
    }
}




class Alumno extends Persona {
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;


    public function __construct($dni, $nombre, $correo, $celular, $fechaNac)
    {
        parent::__construct($dni, $nombre, $correo, $celular);
        $this -> fechaNac = $fechaNac;
        $this -> peso = 0.0;
        $this -> altura = 0.0;
        $this -> aptoFisico = false;
        $this -> presentismo = 0.0;
    }
    
    public function __get($propiedad)
    {
        return $this -> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this -> $propiedad = $valor;
    }

    public function setFichaMedica($peso, $altura, $aptoFisico){
        $this -> $peso;
        $this -> $altura;
        $this -> $aptoFisico;
    }
}




class Entrenador extends Persona {
    private $aClases;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        parent::__construct($dni, $nombre, $correo, $celular);
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

    public function asignarClase($clase){
        $this -> aClase[] = $clase;
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

    public function asignarEntrenador($entrenador){
        $this -> entrenador = $entrenador;
        
    }
    public function inscribirAlumno($alumno){
        $this -> aAlumnos[] = $alumno;
    }
    public function imprimirListado(){
        echo "<table class='table table-hover'>";
        echo "<tr><th class='table-dark text-center' colspan='4'>Clase: " . $this -> nombre . "</th></tr>";
        echo "<tr><th colspan='2'>Entrenador:</th><td colspan='2'>" . $this -> entrenador -> nombre . "</td></tr>";
        echo "<tr><th colspan='4'>Alumnos Inscritos:</th></tr>";
        echo "<tr><th>Dni:</th><th>Nombre:</th><th>Correo:</th><th>Celular:</th>";
        foreach($this -> aAlumnos as $alumno){
            echo "<tr><td>"  . number_format($alumno -> dni, 2, ".", ",") . "</td><td>" . $alumno -> nombre . "</td><td>" . $alumno -> correo . "</td><td>" . $alumno -> celular . "</td></tr>";
        }
    }
}


$entrenador1 = new Entrenador("87392749", "Miguel Ocampo", "miguel@gmail.com", "1144556677");
$entrenador2 = new Entrenador("78346772", "Luis Zarate", "luis@mail.com", "1145632478");

$alumno1 = new Alumno("82372032", "Juan Perez", "juanperez@gmail.com", "11767454321", "1998-08-21");
$alumno1 -> setFichaMedica(90, 178, true);
$alumno1 -> presentismo = 78;

$alumno2 = new Alumno("76473998", "Veronica Saenz", "vero@gmail.com", "115647298", "1997-04-12");
$alumno2 -> setFichaMedica(70, 180, true);
$alumno2 -> presentismo = 70;

$alumno3 = new Alumno("78653223", "Javier Lopez", "javi@gmail.com", "1177886654", "1999-09-06");
$alumno3 -> setFichaMedica(68, 160, false);
$alumno3 -> presentismo = 80;

$alumno4 = new Alumno("12457342", "Miguel Alvez", "miguel@gmail.com", "1145674323", "1998-06-03");
$alumno4 -> setFichaMedica(80, 180, true);
$alumno4 -> presentismo = 60;

$clase1 =new Clase();
$clase1 -> nombre = "King Boxing";
$clase1 -> asignarEntrenador($entrenador1);
$clase1 -> inscribirAlumno($alumno1);
$clase1 -> inscribirAlumno($alumno2);
$clase1 -> inscribirAlumno($alumno3);


$clase2 = new Clase();
$clase2 -> nombre = "Zumba";
$clase2 -> asignarEntrenador($entrenador2);
$clase2 -> inscribirAlumno($alumno2);
$clase2 -> inscribirAlumno($alumno4);



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases Gimnsia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                Gimnasio
            </div>
            <div class="row">
                <div class="col-12">
                    <?php $clase1 -> imprimirListado(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php $clase2 -> imprimirListado(); ?>
                </div>
            </div>

        </div>

    </main>    
</body>
</html>