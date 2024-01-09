<?php
include("../Conexion/Conexion.php");


$NameMovie = "";
$DateMovie = "";
$Year = "";
$url = "";
$Caratula = "";
$Descripcion ="";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NameMovie = $_POST["Movies"];
    $DateMovie = $_POST["income"];
    $Year = $_POST["Year"];
    $url = $_POST["url"];
    $Descripcion = $_POST["Descripcion"];
    $Categoria = $_POST ["Categoria"];

    // Obtener información del archivo
    $caratulaNombre = $_FILES["Caratula"]["name"];
    $caratulaTmp = $_FILES["Caratula"]["tmp_name"];
    $caratulaSize = $_FILES["Caratula"]["size"];
    $caratulaType = $_FILES["Caratula"]["type"];

    // Mover el archivo al directorio deseado
    $directorioDestino = "../../Imagenes/";
    $rutaCaratula = $directorioDestino . $caratulaNombre;
    move_uploaded_file($caratulaTmp, $rutaCaratula);

    // Insertar la información en la base de datos
    $objconexion = new Conexion();

    $sql = "INSERT INTO `registrarp`(`id`, `NameMovie`, `DateMovie`, `Year`, `url`, `Caratula`,`Descripcion`,`Categoria`) VALUES (NULL,'$NameMovie','$DateMovie','$Year','$url','$rutaCaratula','$Descripcion','$Categoria');";

    $objconexion->ejecutar($sql);
    $mensaje = "Registraste la pelicula  con Exito!! . ";
    echo '<script type="text/javascript">alert("' . $mensaje . '");window.location.href="../../BackPag/Pagina_Principal/Index.php";</script></script>'; // Agrega esta línea para verificar el envío del formulario
}

$objconexion = new Conexion();
//$resultado = $objconexion->consultar("SELECT * FROM `registrarp`");
?>
<?php include("../Navbar/navbar.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Css/Formulario.css">
    <title>Document</title>
</head>
<body>
    <div class="login-box">
        <h2>Registro Peliculas</h2>
        <form action="../../BackPag/RegistroPeliculas/RegisterMovies.php" method="post" enctype="multipart/form-data">
            <div class="user-box">
                <input type="text" required="" class="form-control" required=""  name="Movies" id="Movies" value="">
                <label>Ingresa Tu Película</label>
            </div>

            <div class="user-box">
                <input type="date" class="form-control" required=""  name="income" id="income" value="">
            </div>

            <div class="user-box">
                <input type="number" class="form-control" required=""  name="Year" id="Year" value="">
                <label>Año de la película</label>
            </div>

            <div class="user-box">
                <input type="text" required=""  class="form-control" required=""  name="url" id="url" value="">
                <label>URL</label>
            </div>

            <div class="user-box">
                <input type="file" class="form-control" required=""  name="Caratula" id="Caratula" value="">
            </div>

            <div class="user-box">
      <input type="text" required="" class="form-control"   name="Descripcion" id="Descripcion" value="">
      <label>Descripcion</label>
    </div>

            <div class="user-box">
                <select class="form-control" required="" name="Categoria" id="Categoria">
                    <option value="Terror">Terror</option>
                    <option value="Animada">Animada</option>
                    <option value="Accion">Accion</option>
                    <option value="Intriga">Intriga</option>
                </select>
            </div>
    <br>
            <div class="user-box">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
        <br>
        <form action="../Pagina_Principal/Index.php" method="post">
            <div class="user-box">
                <button type="submit" class="btn btn-primary">Volver</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

