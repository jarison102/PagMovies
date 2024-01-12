    <?php include("../Conexion/Conexion.php") ?>

    <?php
    // Iniciar la sesión
    session_start();

    // Inicializamos las variables para almacenar los valores del formulario.
    $Email = "";
    $NamePerson = "";
    $Cargos = "";
    $mensaje = "";
/*
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturamos los valores del formulario.
        $Email = $_POST["Email"];
        $NamePerson = $_POST["NamePerson"]; 

        // Crear una instancia de la clase Conexion
        $conexionBD = new Conexion();

        // Validar el formulario
        $validado = $conexionBD->validarRegistroP($Email, $NamePerson);

        if ($validado) {
            // Si se encontraron coincidencias, permitir el acceso.
            // Obtener el nombre de la persona que inició sesión
            $nombreUsuario = obtenerNombreUsuario($Email);

            // Almacenar el nombre en una variable de sesión
            $_SESSION['nombreUsuario'] = $nombreUsuario;

            $mensaje = "Acceso permitido. Bienvenido, $nombreUsuario";
            echo '<script type="text/javascript">alert("'. $mensaje .'"); window.location.href="../../BackPag/Pagina_Principal/Index.php";</script>';
            exit(); // Asegurarse de salir del script después de la redirección.
        } else {
            $mensaje = "Acceso denegado.";
            // Mostrar una alerta con JavaScript
            echo '<script type="text/javascript">alert("' . $mensaje . '");</script>';
        }
    }
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los valores del formulario
    $Email = $_POST["Email"];
    $NamePerson = $_POST["NamePerson"];

    // Crear una instancia de la clase Conexion
    $conexionBD = new Conexion();

    // Validar el formulario
    $userInfo = obtenerNombreUsuarioC($Email);

    if ($userInfo) {
        // Almacenar el nombre y cargos en variables de sesión
        $_SESSION['nombreUsuario'] = $userInfo['NamePerson'];
        $_SESSION['cargosUsuario'] = $userInfo['Cargos'];

        // Redirigir según el cargo
        if ($userInfo['Cargos'] === 'Administrador') {
            header("Location: ../../BackPag/Pagina_Principal/Index.php");
        } else {
            
            header("Location: ../../BackPag/User/UserIndex.php");
        }
        exit();
    } else {
        $mensaje = "Acceso denegado.";
        // Mostrar una alerta con JavaScript
        echo '<script type="text/javascript">alert("' . $mensaje . '");</script>';
    }
}


    function obtenerNombreUsuario($email) {
        // Realizar una consulta para obtener el nombre de la persona usando el correo electrónico
        $conexionBD = new Conexion();
        $sql ="SELECT NamePerson, Cargos FROM registerperson WHERE Email =:email";
        //$sql = "SELECT NamePerson FROM registerperson WHERE Email = :email";
        $stmt = $conexionBD->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró el nombre
        if ($result) {
            return $result['NamePerson'];
        } else {
            return "Nombre Desconocido"; // Puedes ajustar el mensaje según tu necesidad
        }
    }


    function obtenerNombreUsuarioC($Email) {
        $conexionBD = new Conexion();
        $sql = "SELECT NamePerson, Cargos FROM registerperson WHERE Email = :email";
        $stmt = $conexionBD->prepare($sql);
        $stmt->bindParam(':email', $Email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return $result; // Devolver la información del usuario (Nombre y Cargos)
        } else {
            return null; // No se encontró el usuario
        }
    }
    


    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../../Css/Login.css">
    </head>

    <body>
        <div class="login-root">
            <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
                <div class="loginbackground box-background--white padding-top--64">
                    <div class="loginbackground-gridContainer">
                        <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;"></div>
                        </div>
                        <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                        </div>
                        <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                        </div>
                        <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                        </div>
                        <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                        </div>
                        <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                        </div>
                        <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                        </div>
                        <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                        </div>
                        <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
                        </div>
                    </div>
                </div>
                <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
                    <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                        <h1><a href="" rel="dofollow">Login</a></h1>
                    </div>
                    <div class="formbg-outer">
                        <div class="formbg">
                            <div class="formbg-inner padding-horizontal--48">
                                <span class="padding-bottom--15">Iniciar sesión en su cuenta</span>
                                <form id="stripe-login" method="post" action="login.php">
                                    <div class="field padding-bottom--24">
                                        <label for="Email">Email</label>
                                        <input type="Email" name="Email" id="Email" class="field input">
                                    </div>
                                    <div class="field padding-bottom--24">
                                        <label for="NamePerson">Ingresa tu Nombre</label>
                                        <input type="text" name="NamePerson" id="NamePerson" class="field input">
                                    </div>
                                    <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                                        <label for="checkbox">
                                            <input type="checkbox" name="checkbox" class="field-checkbox input" id="checkbox"> Permanecer registrado durante una semana
                                        </label>
                                    </div>
                                    <div class="field padding-bottom--24">
                                        <input type="submit" name="submit" value="Continue" class="input[type='submit']">
                                    </div>
                                    <div class="field">
                                        <a class="ssolink" href="#">Utilice el inicio de sesión único (Google) en su lugar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="footer-link padding-top--24">
                            <span>¿No tienes una cuenta?  <a href="">Inscribirse</a></span>
                            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
                                <span><a href="#">© Jarison Stived</a></span>
                                <span><a href="#">Contacto</a></span>
                                <span><a href="#">Privacidad y Terminos</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

