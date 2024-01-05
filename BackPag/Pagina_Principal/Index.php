<?php include("../Conexion/Conexion.php") ?>
<?php 
//echo ("Hola");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">StivurFlix</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../BackPag/Registro/Registro.php">Registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../BackPag/RegistroPeliculas/RegisterMovies.php">Registrarse Pelicula</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../BackPag/Login/Login.php">Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categoria
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Miedo</a></li>
            <li><a class="dropdown-item" href="#">Suspenso</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Accion</a></li>
          </ul>
        </li>

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!--Primera fase-->
<div class="row row-cols-1 row-cols-md-2 g-4">
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <a href="https://www.youtube.com/watch?v=zKccREwbRbs" target="_blank">
        <img src="../../BackPag/Imagenes/Gato.jpg" class="card-img-top" alt="...">
      </a>
      <div class="card-body">
        <h5 class="card-title">El Gato del Sombrero Mágico</h5>
        <p class="card-text">Descripción de la película o cualquier otro contenido que desees agregar.</p>
      </div>
    </div>
  </div>
</div>


<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <a href="https://www.youtube.com/watch?v=sTdDiBywH8k" target="_blank">
        <img src="../../BackPag/Imagenes/Campamento.jpg" class="card-img-top" alt="...">
      </a>
      <div class="card-body">
        <h5 class="card-title">Campamento Lakebottom</h5>
        <p class="card-text">Descripción de la película o cualquier otro contenido que desees agregar.</p>
      </div>
    </div>
  </div>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <a href="https://www.youtube.com/watch?v=Ggn6A_3xcaw" target="_blank">
        <img src="../../BackPag/Imagenes/Bob.jpg" class="card-img-top" alt="...">
      </a>
      <div class="card-body">
        <h5 class="card-title">Bob Esponja</h5>
        <p class="card-text">Descripción de la película o cualquier otro contenido que desees agregar.</p>
      </div>
    </div>
  </div>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <a href="https://www.youtube.com/watch?v=w-YfE1F9Pag" target="_blank">
        <img src="../../BackPag/Imagenes/MADAGASCAR 3 PELICULA COMPLETA.webp" class="card-img-top" alt="...">
      </a>
      <div class="card-body">
        <h5 class="card-title">MADAGASCAR 3 PELICULA COMPLETA</h5>
        <p class="card-text">Descripción de la película o cualquier otro contenido que desees agregar.</p>
      </div>
    </div>
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