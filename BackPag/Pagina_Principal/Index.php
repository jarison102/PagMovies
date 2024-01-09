<?php include("../Conexion/Conexion.php") ?>
<?php
// Obtén la información de la base de datos (aquí debes realizar la consulta específica para la película que deseas mostrar)
$id = 65; // Cambia esto con el ID de la película que deseas mostrar
$objconexion = new Conexion();
// Verificar si se ha enviado el formulario de filtrado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["categoria"])) {
  $categoriaSeleccionada = $_POST["categoria"];
  if ($categoriaSeleccionada === "Todas") {
    // Si la categoría seleccionada es "Todas", mostrar todas las películas
    $resultado = $objconexion->consultar("SELECT * FROM `registrarp`");
  } else {
    // Mostrar películas filtradas por categoría
    $resultado = $objconexion->consultar("SELECT * FROM `registrarp` WHERE Categoria = '$categoriaSeleccionada'");
  }
} else {
  // Si no se ha enviado el formulario, mostrar todas las películas
  $resultado = $objconexion->consultar("SELECT * FROM `registrarp`");
}

$objconexion = new Conexion();
$resultadoP = $objconexion->consultar("SELECT `NamePerson` FROM `registerperson` ");



// Verifica si la consulta fue exitosa y hay al menos una fila
if ($resultado && count($resultado) > 0) {
  $fila = $resultado[0];
  $nombrePelicula = $fila['NameMovie'];
  $rutaCaratula = $fila['Caratula'];
  $Descripcion = $fila['Descripcion'];
  $Categoria = $fila["Categoria"];
} else {
  // Película no encontrada
  $nombrePelicula = "Película no encontrada";
  $rutaCaratula = "../../Imagenes/No_encontrado.jpg"; // Cambia esto por la ruta de una imagen por defecto
}
?>

<?php include("../Navbar/navbar.php")?>



<!-- Peliculas -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <link rel="stylesheet" href="../../Css/Index.css">
</head>

<body>


  </div>
  <div class="alert alert-secondary" role="alert">
    
    <h4 class="alert-heading"> <?php
                                // Iniciar la sesión
                                session_start();
                                // Verificar si la variable de sesión existe
                                if (isset($_SESSION['nombreUsuario'])) {
                                  // Mostrar el mensaje de bienvenida con el símbolo
                                  echo '<p class="navbar-text">Bienvenido, ' . $_SESSION['nombreUsuario'] . '</p>';
                                }
                                ?></h4>
    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
    <hr>
    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
  </div>




  <div class="row row-cols-4 row-cols-md-4 g-2">
    <?php
    foreach ($resultado as $fila) {
      $nombrePelicula = $fila['NameMovie'];
      $rutaCaratula = $fila['Caratula'];
      $url = $fila['url'];
      $Descripcion = $fila['Descripcion'];
      $Categoria = $fila['Categoria'];

      // Mostrar la información de la película en forma de tarjeta
      echo '<div class="col">';
      echo '  <div class="card">';
      echo '    <a href="' . $url . '" target="_blank">';
      echo '      <img src="' . $rutaCaratula . '" class="card-img-top" alt="Carátula de la película ' . $nombrePelicula . '">';
      echo '    </a>';
      echo '    <div class="card-body">';
      echo '      <h5 class="card-title">' . $nombrePelicula . '</h5>';
      echo '      <p class="card-text">' . $Descripcion . '</p>';
      echo '      <p class="card-text">' . $Categoria . '</p>';
      echo '<button type="button" class="btn btn-dark">Ver</button>';
      echo '<button type="button" class="btn btn-danger">Eliminar</button>';
      echo '<button type="button" class="btn btn-warning">Editar</button>';
      echo '    </div>';
      echo '  </div>';
      echo '</div>';
    }
    ?>
</div>

<a class="btn btn-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  Politicas de privacidad
</a>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>

    </div>
  </div>



  <!-- zona de peliculas 
<div class="container mt-4 d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="width: 70%; margin-top: -60px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../BackPag/Imagenes/297-2971033_anonymous-wallpaper-1366x768-hd.jpg" class="d-block w-100" alt="Primer Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../../BackPag/Imagenes/dia-programador-recluit.jpg" class="d-block w-100" alt="Segundo Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../../BackPag/Imagenes/anonymus_hacker_with_knife_dark_background_hd_hacker-2560x1440.jpg" class="d-block w-100" alt="Tercer Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
-->


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>