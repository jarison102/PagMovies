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
    // Agrega un método prepare a tu clase Conexion
    public function prepare($sql) {
        return $this->conexion->prepare($sql);
    }


// La consulta selecciona todos los campos (*) de la tabla `registerperson`
// donde el correo electrónico (Email) coincide con el valor proporcionado en el marcador de posición :Email
// y el nombre de la persona (NamePerson) coincide con el valor proporcionado en el marcador de posición :NamePerson.
    public function validarRegistroP($Email, $NamePerson) {
    $sql = "SELECT * FROM `registerperson` WHERE Email = :Email AND NamePerson = :NamePerson";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
    $stmt->bindParam(':NamePerson', $NamePerson, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    return ($count > 0); // Devolver true si se encontraron coincidencias, false de lo contrario
}
public function ValidarRegistroEmailNameCargos($Email, $NamePerson) {
    $sql = "SELECT * FROM `registerperson` WHERE Email = :Email AND NamePerson = :NamePerson AND Cargos = 'Administrador'";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
    $stmt->bindParam(':NamePerson', $NamePerson, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($result !== false); // Devolver true si se encontraron coincidencias, false de lo contrario
}
function obtenerNombreUsuarioC($Email, $Cargos) {
    $conexionBD = new Conexion();
    $sql = "SELECT NamePerson FROM registerperson WHERE Email = :email AND Cargos = :Cargos";
    $stmt = $conexionBD->prepare($sql);
    $stmt->bindParam(':email', $Email, PDO::PARAM_STR);
    $stmt->bindParam(':Cargos', $Cargos, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && $Cargos === 'Administrador') {
        return $result['NamePerson'];
    } else {
        return "Nombre Desconocido";
    }
}





public function ValidarRegistroPe($NamePerson, $LastNamePerson,$Year,$DateBirth,$Email,$Country,$department,$Cargos) {
    $sql = "SELECT * FROM `registerperson` WHERE NamePerson = :NamePerson AND LastNamePerson = :LastNamePerson AND Year = :Year AND DateBirth = :DateBirth AND Email =:Email AND Country =:Country AND department =:department AND Cargos =:Cargos";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':NamePerson', $NamePerson, PDO::PARAM_STR);
    $stmt->bindParam(':LastNamePerson', $LastNamePerson, PDO::PARAM_STR);
    $stmt->bindParam(':Year', $Year, PDO::PARAM_STR);
    $stmt->bindParam(':DateBirth', $DateBirth, PDO::PARAM_STR);
    $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
    $stmt->bindParam(':Country', $Country, PDO::PARAM_STR);
    $stmt->bindParam(':department', $department, PDO::PARAM_STR);
    $stmt->bindParam(':Cargos', $Cargos, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    return ($count > 0); // Devolver true si se encontraron coincidencias, false de lo contrario
}


}
// Crear una instancia de la clase para probar la conexión
$miConexion = new Conexion();
?>