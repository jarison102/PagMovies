<?php include("../Conexion/Conexion.php") ?>
<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (otros campos del formulario) ...

    // Manejar la carga de archivos
    $caratulaNombre = $_FILES["Nueva_Caratula"]["name"];
    $caratulaTmp = $_FILES["Nueva_Caratula"]["tmp_name"];
    $caratulaSize = $_FILES["Nueva_Caratula"]["size"];
    $caratulaType = $_FILES["Nueva_Caratula"]["type"];
    
    // Mover el archivo al directorio deseado
    $directorioDestino = "../../Imagenes/";
    $rutaCaratula = $directorioDestino . $caratulaNombre;
    move_uploaded_file($caratulaTmp, $rutaCaratula);




// procesar_edicion.php
$id = $_POST['id'];
$nuevo_nombre = $_POST['nuevo_nombre'];
$Nuevo_Año_de_la_película=$_POST['Nuevo_Año_de_la_película'];
$Estreno_de_pelicula=$_POST['Estreno_de_pelicula'];
$Nueva_url=$_POST['Nueva_url'];
$Nueva_Caratula=$_POST['Nueva_Caratula'];
$Nueva_Descripcion=$_POST['Nueva_Descripcion'];
$Categoria=$_POST['Categoria'];

// Repite esto para otros campos

$objconexion = new conexion();
$sql = "UPDATE `registrarp` SET 
        `NameMovie` = '$nuevo_nombre',
        `DateMovie` = '$Nuevo_Año_de_la_película',
        `Year` = '$Estreno_de_pelicula',
        `url` = '$Nueva_url',
        `Caratula` = '$Nueva_Caratula',
        `Descripcion` = '$Nueva_Descripcion',
        `Categoria` = '$Categoria'
        WHERE `id` = $id";
$objconexion->ejecutar($sql);

header("Location: index.php");
exit;
}
?>