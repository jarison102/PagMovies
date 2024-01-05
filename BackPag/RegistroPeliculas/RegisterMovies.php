<?php
include("../Conexion/Conexion.php");

$NameMovie = "";
$DateMovie = "";
$Year = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NameMovie = $_POST["Movies"];
    $DateMovie = $_POST["income"];
    $Year = $_POST["Year"];

    $objconexion = new conexion();

    $sql = "INSERT INTO `registrarp`(`id`, `NameMovie`, `DateMovie`, `Year`) VALUES (Null,'$NameMovie','$DateMovie','$Year');";

    $objconexion->ejecutar($sql);

    echo "Formulario enviado"; // Agrega esta línea para verificar el envío del formulario
}

$objconexion = new conexion();
$resultado = $objconexion->consultar("SELECT * FROM `registrarp`");
//print_r($resultado);
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
                                        <br>
                                        <button type="submit" class="btn btn-success">Enviar</button>
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
