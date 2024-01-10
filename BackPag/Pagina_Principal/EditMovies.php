<?php include("../Conexion/Conexion.php") ?>
<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $objconexion = new conexion();
  $sql = "SELECT * FROM `registrarp` WHERE `id` = $id";
  $resultado = $objconexion->consultar($sql);

  if ($resultado && count($resultado) > 0) {
      $pelicula = $resultado[0];
  } else {
      echo "Película no encontrada.";
      exit;
  }
} else {
  header("Location: index.php");
  exit;
}

?>




<!-- Peliculas -->
<!-- Peliculas -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>

<body>
    <form action="procesar_edicion.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $pelicula['id']; ?>">
        <label for="nuevo_nombre">Ingresa Tu nueva Película:</label>
        <input type="text" name="nuevo_nombre" id="nuevo_nombre" value="<?php echo $pelicula['NameMovie']; ?>" required>
        <br>
        <label for="Nuevo_Año_de_la_película">Cuando se estreno la nueva pelicula</label>
        <input type="date" name="Nuevo_Año_de_la_película" id="Nuevo_Año_de_la_película"
            value="<?php echo $pelicula['DateMovie']; ?>" required>
        <br>
        <label for="Estreno_de_pelicula:">Estreno de pelicula:</label>
        <input type="text" name="Estreno_de_pelicula" id="Estreno_de_pelicula"
            value="<?php echo $pelicula['Year']; ?>" required>
        <br>
        <label for="Nueva_url">Nueva url:</label>
        <input type="text" name="Nueva_url" id="Nueva_url" value="<?php echo $pelicula['url']; ?>" required>
        <br>

        <div class="user-box">
        <label for="Nueva_Caratula">Nueva Caratula:</label>
        <input type="file" name="Nueva_Caratula" id="Nueva_Caratula">
        <img src="<?php echo $pelicula['Caratula']; ?>" alt="Carátula actual">
    </div>
        <br>
        <label for="Nueva_Descripcion">Nueva Descripcion:</label>
        <input type="text" name="Nueva_Descripcion" id="Nueva_Descripcion"
            value="<?php echo $pelicula['Descripcion']; ?>" required>
        <br>

        <select class="form-control" required="" name="Categoria" id="Categoria">
            <option value="Terror" <?php if ($pelicula['Categoria'] == 'Terror') echo 'selected'; ?>>Terror</option>
            <option value="Animada" <?php if ($pelicula['Categoria'] == 'Animada') echo 'selected'; ?>>Animada</option>
            <option value="Accion" <?php if ($pelicula['Categoria'] == 'Accion') echo 'selected'; ?>>Accion</option>
            <option value="Intriga" <?php if ($pelicula['Categoria'] == 'Intriga') echo 'selected'; ?>>Intriga</option>
        </select>

        <br>
        <!-- Repite esto para otros campos -->
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
    

</body>

</html>






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