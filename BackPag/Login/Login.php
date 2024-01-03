<?php include("../Conexion/Conexion.php") ?>

<?php 
// Inicializamos las variables para almacenar los valores del formulario.
$Email = "";
$NamePerson = "";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos los valores del formulario.
    $Email = $_POST["Email"];
    $NamePerson = $_POST["NamePerson"];

    // Crear una instancia de la clase Conexion
    $conexionBD = new Conexion();

    // Validar el formulario
    $validado = $conexionBD -> validarRegistroP($Email, $NamePerson);

    if ($validado) {
        // Si se encontraron coincidencias, permitir el acceso.
        // Si se encontraron coincidencias, mostrar la alerta y permitir el acceso.
        $mensaje = "Acceso permitido.";
        echo '<script type="text/javascript">alert("'. $mensaje .'"); window.location.href="../../BackPag/Pagina_Principal/Index.php";</script>';
        exit(); // Asegurarse de salir del script después de la redirección.
    }/*else if ($validadoA){
        $mensaje = "Acceso permitido.";
        header("location:indexAlumnos.php");
        
    } */else {
        $mensaje = "Acceso denegado.";
        // Mostrar una alerta con JavaScript
        echo '<script type="text/javascript">alert("' . $mensaje . '");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-4">
                            <br>
                            <div class="card">
                                <div class="card-header">
                                    Login
                                </div>
                                <div class="card-body">
                                    <form action="login.php" method="post">
                                        <br>
                                        Ingresa el correo:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarimices@gmail.com" name="Email">
                                        <br>
                                        Ingresa tu Nombre:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarison" name="NamePerson">
                                        <br>
                                        <input type="submit" value="Entrar" class="btn btn-success">

                                    </form>
                                    <form action="../../BackPag/Registro/Registro.php">
                                        <br>
                                        <input type="submit" value="Registrarse" class="btn btn-warning">
                                    </form>

                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
</body>
</html>