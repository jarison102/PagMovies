<?php include("../Conexion/Conexion.php") ?>
<?php include("../Navbar/navbar.php")?>

<?php
// Inicializamos las variables para almacenar los valores del formulario.
$NamePerson = "";
$LastNamePerson = "";
$Year = "";
$DateBirth = "";
$Email = "";
$Country = "";
$departament = "";
$Cargo = "";
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
    $Cargo = $_POST['Cargo'];

    // Crear una instancia de la clase Conexion
    $conexionBD = new Conexion();

    // Validar el formulario
    $validado = $conexionBD -> ValidarRegistroPe($NamePerson, $LastNamePerson,$Year,$DateBirth,$Email,$Country,$department,$Cargo);

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
        $mensaje = "Te registrate con Exito!! . ";
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
    $Cargo = $_POST ['Cargo'];

    // Asignar id_cargo según la selección del usuario
    $id_cargo = ($Cargo == 'Administrador') ? 2 : 1;
    $objconexion =  new conexion();

    $sql = "INSERT INTO `registerperson`(`id_registerperson`, `NamePerson`, `LastNamePerson`, `Year`, `DateBirth`, `Email`, `Country`, `department`, `Cargos`, `id_cargo`) VALUES (Null,'$NamePerson','$LastNamePerson','$Year','$DateBirth','$Email','$Country','$department','$Cargo', $id_cargo);";

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
    <link rel="stylesheet" href="../../Css/Formulario.css">
    <title>Document</title>
</head>
<div class="login-box">
  <h2>Registro</h2>
  <form action="./Registro.php" method="post" enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" required="" class="form-control" name="NamePerson" id="NamePerson" value="">
      <label>Ingresa Tu Nombre</label>
    </div>

    <div class="user-box">
      <input type="text" class="form-control" name="LastNamePerson" id="LastNamePerson" value="" required="">
      <label>Ingresa Tu Apellido</label>
    </div>

    <div class="user-box">
      <input type="text" class="form-control" name="Year" id="Year" value="" required="">
      <label>Ingresa Tus años</label>
    </div>

    <div class="user-box">
      <input type="date" class="form-control" name="DateBirth" id="DateBirth" value="" required="">
      <label>Ingresa tu Fecha de nacimiento</label>
    </div>

    <div class="user-box">
      <input type="text" class="form-control" name="Email" id="Email" value="" required="">
      <label>Ingresa Tu Correo</label>
    </div>

    <div class="user-box">
      <input type="text" class="form-control" name="Country" id="NewCountry" value="" required="" oninput="UpdateDepartament()">
      <label>Ingresa Tu Pais</label>
    </div>

    <div class="user-box">
      <select id="NewDepartament" name="department" class="form-control">
                                            <!-- Aquí se llenarán los departamentos automáticamente -->
                                        </select>  
    </div>
  <br>

      <select name="Cargo" id="Cargos" class="form-control">
        <option value="User">Usuario</option>
        <option value="Administrador">Administrador</option>
      </select>
<br>

      <div class="user-box">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
  </form>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../animationsPage/AnimationsOne.js"></script>
</html>


