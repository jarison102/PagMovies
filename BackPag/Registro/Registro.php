<?php include("../Conexion/Conexion.php") ?>

<?php
// Inicializamos las variables para almacenar los valores del formulario.
$NamePerson = "";
$LastNamePerson = "";
$Year = "";
$DateBirth = "";
$Email = "";
$Country = "";
$departament = "";
$mensaje = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos los valores del formulario.
    $NamePerson = $_POST["NamePerson"];
    $LastNamePerson = $_POST["LastNamePerson"];
    $Year = $_POST["Year"];
    $DateBirth = $_POST["DateBirth"];
    $Email = $_POST["Email"];
    $Country = $_POST["Country"];
    $department = $_POST["department"];

    // Crear una instancia de la clase Conexion
    $conexionBD = new Conexion();

    // Validar el formulario
    $validado = $conexionBD -> ValidarRegistroPe($NamePerson, $LastNamePerson,$Year,$DateBirth,$Email,$Country,$department);

    if ($validado) {
        // Si se encontraron coincidencias, permitir el acceso.
        // Si se encontraron coincidencias, mostrar la alerta y permitir el acceso.
        $mensaje = "Acceso denegado ya se encuentra registrado..";
        echo '<script type="text/javascript">alert("'. $mensaje .'");window.location.href="../../BackPag/Registro/Registro.php";</script>';
        exit(); // Asegurarse de salir del script después de la redirección.
    }/*else if ($validadoA){
        $mensaje = "Acceso permitido.";
        header("location:indexAlumnos.php");
        
    } */else {
        $mensaje = "Te registrate con Exito!!";
        // Mostrar una alerta con JavaScript
        echo '<script type="text/javascript">alert("' . $mensaje . '");window.location.href="../../BackPag/Pagina_Principal/Index.php";</script></script>';
    }
    
}
?>
<?php
if ($_POST) {

    $NamePerson = $_POST['NamePerson'];
    $LastNamePerson = $_POST['LastNamePerson'];
    $Year = $_POST['Year'];
    $DateBirth = $_POST['DateBirth'];
    $Email = $_POST['Email'];
    $Country = $_POST['Country'];
    $department = $_POST['department'];

    $objconexion =  new conexion();

    $sql = "INSERT INTO `registerperson`(`id`, `NamePerson`, `LastNamePerson`, `Year`, `DateBirth`,`Email`, `Country`,`department`) VALUES (Null,'$NamePerson','$LastNamePerson','$Year','$DateBirth','$Email','$Country','$department');";

    $objconexion->ejecutar($sql);
}

$objconexion =  new conexion();
$resultado = $objconexion->consultar("SELECT * FROM `registerperson`");
//print_r($resultado);

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
                                    <center>
                                        <h1>Registrarse</h1>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <form action="./Registro.php" method="post" enctype="multipart/form-data">
                                        <br>
                                        Ingresa Tu Nombre:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarison" name="NamePerson" id="NamePerson" value="">
                                        <br>
                                        Ingresa Tu Apellido:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Cespedes" name="LastNamePerson" id="LastNamePerson" value="">
                                        <br>
                                        Ingresa Tus años:
                                        <br>
                                        <input type="text" class="form-control" placeholder="19" name="Year" id="Year" value="">
                                        <br>
                                        Ingresa tu Fecha de nacimiento:
                                        <br>
                                        <input type="date" class="form-control" placeholder="19" name="DateBirth" id="DateBirth" value="">
                                        <br>
                                        Ingresa Tu Correo:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarimices@gmail.com" name="Email" id="Email" value="">
                                        <br>
                                        Ingresa Tu Pais:
                                        <br>
                                        <label for="Pais">País:</label>
                                        <input type="text" class="form-control" placeholder="Colombia" name="Country" id="NewCountry" value="" oninput="UpdateDepartament()" required>
                                        <br>
                                        Ingresa Tu Departamento:
                                        <br>
                                        <label for="department">Departamento:</label>
                                        <select id="NewDepartament" name="department" class="form-control">
                                            <!-- Aquí se llenarán los departamentos automáticamente -->
                                        </select>   
                                        <br>
                                        <button type="submit" class="btn btn-success">Enviar</button>
                                    </form>
                                    <br>
                                    <form action="../../BackPag/Login/Login.php" method="post">
                                        <button type="submit" class="btn btn-warning">Login</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../animationsPage/AnimationsOne.js"></script>
</html>


