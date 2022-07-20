<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario datos personales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 my-3 text-center">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="resultado.php" method="POST">
                    <div class="col-12">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control my-2">
                    </div>
                    <div class="col-12">
                        <label for="txtApellido">Apellido</label>
                        <input type="text" name="txtApellido" id="txtApellido" class="form-control my-2">
                    </div>
                    <div class="col-12">
                        <label for="txtDni">DNI</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control my-2">
                    </div>
                    <div class="col-12">
                        <label for="txtNumero">Telefono</label>
                        <input type="text" name="txtNumero" id="txtNumero" class="form-control my-2">
                    </div>
                    <div class="col-12">
                        <label for="txtEdad">Edad</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control my-2">
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>