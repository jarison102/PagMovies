<?php 

class conexion{
    private $servidor="localhost";
    private $usuario ="root";
    private $contraseña="";
    private $conexion;

    public function __construct()
    {
        try{
            $this->conexion=new PDO("mysql:host=$this->servidor;dbname=moviespage",$this->usuario,$this->contraseña);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo("Conexion Exitosa");
        }
        catch(PDOException $e){
            echo "Falla de conexion " .$e->getMessage();
        }
    }
    public function ejecutar($sql){//insertar/delete/actualizar
        $this ->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }
    
    public function consultar($sql){
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        //retorna todos los elementos que tu puedas consultar con la sentencia sql
        return $sentencia->fetchAll();
    }


    public function validarRegistroP($Email, $NamePerson) {
    $sql = "SELECT * FROM `registerperson` WHERE Email = :Email AND NamePerson = :NamePerson";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
    $stmt->bindParam(':NamePerson', $NamePerson, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    return ($count > 0); // Devolver true si se encontraron coincidencias, false de lo contrario
}


}
// Crear una instancia de la clase para probar la conexión
$miConexion = new Conexion();
?>