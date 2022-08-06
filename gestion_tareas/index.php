<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo.txt")){
    $jsonTareas = file_get_contents("archivo.txt");

    $aTareas = json_decode($jsonTareas, true);
} else{
    $aTareas = array();
}

if(isset($_POST["btnEnviar"])){
    $prioridad = $_POST["txtPrioridad"];
    $usuario = $_POST["txtUsuario"];
    $estado = $_POST["txtEstado"];
    $titulo = $_POST["txtTitulo"];
    $descripcion = $_POST["txtDescripcion"];

    $aTareas = array();

    $aTareas[] = array("prioridad" => $prioridad,
                    "usuario" => $usuario,
                    "estado" => $estado,
                    "titulo" => $titulo
                    
    );


    $jsonTareas = json_encode(($aTareas));
    file_put_contents("archivo.txt", $jsonTareas);
    
} 















?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <form action="" method="post">
                <div class="row">
                    <div class="col-4">
                        <label for="txtPrioridad">Prioridad:</label>
                        <select name="txtPrioridad" id="txtPrioridad" class="form-control">
                            <option value="seleccionar" disabled selected>Seleccionar</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="txtUsuario">Usuario:</label>
                        <select name="txtUsuario" id="txtUsuario" class="form-control">
                            <option value="seleccionar" disabled selected>Seleccionar</option>
                            <option value="Ana">Ana</option>
                            <option value="Bernabe">Bernabé</option>
                            <option value="Daniela">Daniela</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="txtEstado">Estado:</label>
                        <select name="txtEstado" id="txtEstado" class="form-control">
                            <option value="seleccionar" disabled selected>Seleccionar</option>
                            <option value="Sin signar">Sin Asignar</option>
                            <option value="Asignado">Asignado</option>
                            <option value="Proceso">En Proceso</option>
                            <option value="Terminado">Terminado</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="txtTitulo">Titulo:</label>
                        <input type="text" name="txtTitulo" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="txtDescripcion">Descripción</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <button type="submit" name="btnEnviar" class="btn btn-primary my-2">Enviar</button>
                <button type="submit" name="btnCancelar" class="btn my-2">Cancelar</button>
            </form>
        </div>
        <div class="row">
            <div class="col-12 my-3">
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Fecha de incersion</th>
                        <th>Titulo</th>
                        <th>Prioridad</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($aTareas as $pos => $tarea): ?>
                            <td><?php echo $pos; ?></td>
                            <td><?php echo date("d/m/Y"); ?></td>
                            <td><?php echo $tarea["titulo"]; ?></td>
                            <td><?php echo $tarea["prioridad"]; ?></td>
                            <td><?php echo $tarea["usuario"]; ?></td>
                            <td><?php echo $tarea["estado"]; ?></td>
                            <td></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>