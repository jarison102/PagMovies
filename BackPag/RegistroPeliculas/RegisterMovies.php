<?php
include("../Conexion/Conexion.php");

$NameMovie = "";
$DateMovie = "";
$Year = "";
$url = "";
$Caratula = "";
$Descripcion ="";

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

    echo "Formulario enviado"; // Agrega esta línea para verificar el envío del formulario
}

$objconexion = new Conexion();
//$resultado = $objconexion->consultar("SELECT * FROM `registrarp`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                        <h1>Registrar Películas</h1>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <form action="../RegistroPeliculas/RegisterMovies.php" method="post" enctype="multipart/form-data">
                                        <br>
                                        Ingresa Tu Película:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Sonic" name="Movies" id="Movies" value="">
                                        <br>
                                        Cuando Ingreso a Cartelera:
                                        <br>
                                        <input type="date" class="form-control" placeholder="20-05-2020" name="income" id="income" value="">
                                        <br>
                                        Año de la película:
                                        <br>
                                        <input type="number" class="form-control" placeholder="2020" name="Year" id="Year" value="" >
                                        <br>
                                        URL:
                                        <br>
                                        <input type="text" class="form-control" placeholder="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=moviespage&table=registrarp" name="url" id="url" value="" >
                                        <br>
                                        Carutula:
                                        <br>
                                        <input type="file" class="form-control" placeholder="https://img.freepik.com/foto-gratis/leon.jpg" name="Caratula" id="Caratula" value="" >
                                        <br>
                                        Descripcion:
                                        <br>
                                        <input type="text" class="form-control" placeholder="7 enanos en ruedas" name="Descripcion" id="Descripcion" value="" >
                                        <br>
                                        Categoria:
                                        <br>
                                        <select type="text" class="form-control" placeholder="Animada" name="Categoria" id="Categoria" value="" >
                                            <option value="Terror">Terror</option>
                                            <option value="Animada">Animada</option>
                                            <option value="Accion">Accion</option>
                                            <option value="Intriga">Intriga</option>
                                        </select>
                                        <br>
                                        <button type="submit" class="btn btn-success">Enviar</button>
                                        <br>
                                        <br>
                                    </form>
                                    <form action="../Pagina_Principal/Index.php" method="post">
                                        <button type="submit" class="btn btn-primary">Volver</button>
                                    </form>
                                    <br>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
