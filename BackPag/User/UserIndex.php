<?php include("../Conexion/Conexion.php")?>
<?php include("../Navbar/navbarU.php")?>

<?php
// Iniciar la sesión
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../Css/Index.css">
  <title>Document</title>
</head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
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

if ($_GET) {
  $id = $_GET['borrar'];
  $objconexion = new conexion();
  $sql = "DELETE FROM `registrarp` WHERE `registrarp`.`id` = " . $id;
  $objconexion->ejecutar($sql);
}

?>




<!-- Peliculas -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <link rel="stylesheet" href="../../Css/Index.css">
  <link rel="stylesheet" href="../../Css/ElevarC.css">
<script src="https://cdn.jsdelivr.net/npm/get-image-colors"></script>
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




  <div class="row row-cols-2 row-cols-md-4 g-8">
    <?php
    
    foreach ($resultado as $indice => $fila) {
        $nombrePelicula = $fila['NameMovie'];
        $rutaCaratula = $fila['Caratula'];
        $url = $fila['url'];
        $Descripcion = $fila['Descripcion'];
        $Categoria = $fila['Categoria'];

        // Generar un ID único para cada modal
        $modalID = 'verPeliculaModal' . $indice;

        // Mostrar la información de la película en forma de tarjeta
        echo '<div class="col"  onmouseover="showDetail(this)" onmouseout="hideDetail(this)"> ';
        echo '  <div class="card">';
        echo '    <a href="' . $url . '" target="_blank">';
        echo '      <img src="' . $rutaCaratula . '" class="card-img-top" alt="Carátula de la película ' . $nombrePelicula . '">';
        echo '    </a>';
        echo '    <div class="card-body">';
        echo '      <h5 class="card-title">' . $nombrePelicula . '</h5>';
        echo '      <p class="card-text">' . $Descripcion . '</p>';
        echo '      <p class="card-text">' . $Categoria . '</p>';
        echo '      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#' . $modalID . '">Ver Detalle de Pelicula</button>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';

        // Contenido del modal específico para cada película
        echo '<div class="modal fade" id="' . $modalID . '" tabindex="-1" role="dialog" aria-labelledby="' . $modalID . 'Label" aria-hidden="true">';
        echo '  <div class="modal-dialog" role="document">';
        echo '    <div class="modal-content">';
        echo '      <div class="modal-header">';
        echo '        <h5 class="modal-title" id="' . $modalID . 'Label">Detalles de la película.</h5>';
        echo '        <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '          <span aria-hidden="true">&times;</span>';
        echo '        </button>';
        echo '      </div>';
        echo '      <div class="modal-body">';
        echo '        <h5 id="modalPeliculaTitulo"></h5>';
        echo '        <img src="' . $rutaCaratula . '" class="card-img-top" alt="Carátula de la película ' . $nombrePelicula . '">';
        echo '        <h5 id="modalPeliculaDescripcion">' . $nombrePelicula . '</h5>';
        echo '        <p id="modalPeliculaDescripcion">' . $Descripcion . '</p>';
        echo '        <p id="modalPeliculaCategoria">' . $Categoria . '</p> ';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }
    ?>
</div>

<!--Modal de politicas-->
<a class="btn btn-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  Politicas de privacidad
</a>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Politicas de privacidad</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>


    <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidad - Stived Films</title>
    <link rel="stylesheet" href="tu_estilo.css">
</head>

<body>

    <header>
        <!-- Aquí podría ir el encabezado de tu página -->
    </header>

    <main>
        <section id="politica-privacidad">
            <h2>Política de Privacidad de Stived Films</h2>

            <p>Última actualización: 1/06/2024</p>

            <p>Bienvenido a Stived Films, la página de películas donde disfrutarás de la mejor experiencia cinematográfica. En Stived Films, valoramos y respetamos tu privacidad. Esta Política de Privacidad explica cómo recopilamos, utilizamos y protegemos la información personal que puedas proporcionarnos mientras utilizas nuestra plataforma.</p>

            <!-- Añade más secciones según sea necesario -->

            <h3>Información que Recopilamos</h3>

            <p>1. **Información Personal:**<br>
                Cuando te registras en Stived Films, recopilamos tu nombre de usuario y dirección de correo electrónico.</p>

            <p>2. **Información de Navegación:**<br>
                Recopilamos información sobre cómo utilizas nuestra plataforma, como las películas que ves y las páginas que visitas.</p>

            <h3>Uso de la Información</h3>

            <p>Utilizamos la información recopilada para:</p>
            <ul>
                <li>Personalizar tu experiencia en Stived Films.</li>
                <li>Enviarte actualizaciones sobre nuevas películas y contenido relacionado.</li>
                <li>Mejorar y optimizar nuestro servicio.</li>
            </ul>

            <!-- Añade más secciones según sea necesario -->

            <h3>Compartir Información</h3>

            <p>**No compartimos tu información personal con terceros** a menos que sea necesario para proporcionar nuestros servicios o cumplir con la ley.</p>

            <!-- Añade más secciones según sea necesario -->

            <h3>Cookies y Tecnologías Similares</h3>

            <p>Utilizamos cookies y tecnologías similares para mejorar la funcionalidad de nuestra plataforma y ofrecerte una experiencia personalizada.</p>

            <!-- Añade más secciones según sea necesario -->

            <h3>Seguridad</h3>

            <p>Tomamos medidas de seguridad para proteger tu información contra accesos no autorizados o alteraciones. Sin embargo, ten en cuenta que ninguna transmisión por internet es completamente segura.</p>

            <!-- Añade más secciones según sea necesario -->

            <h3>Menores de Edad</h3>

            <p>Stived Films no está dirigido a menores de 13 años, y no recopilamos intencionalmente información de niños menores de esa edad.</p>

            <!-- Añade más secciones según sea necesario -->

            <h3>Cambios en la Política de Privacidad</h3>

            <p>Nos reservamos el derecho de actualizar esta política en cualquier momento. Te notificaremos sobre cambios significativos a través de la plataforma o mediante el correo electrónico proporcionado.</p>

            <!-- Añade más secciones según sea necesario -->

            <h3>Contacto</h3>

            <p>Si tienes preguntas o inquietudes sobre nuestra política de privacidad, por favor, contáctanos en [correo electrónico].</p>

            <!-- Añade más secciones según sea necesario -->

            <p>Gracias por elegir Stived Films para tu entretenimiento. ¡Disfruta de las películas!</p>
        </section>
    </main>

    <footer>
        <!-- Aquí podría ir el pie de página de tu página -->
    </footer>

</body>

</html>

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



<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../../animationsPage/Fly.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>