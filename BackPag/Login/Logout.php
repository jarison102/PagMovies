<?php
// Inicia la sesión (si no está iniciada)
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

// Cierre de sesión para el usuario
unset($_SESSION['user']);

// Cierre de sesión para el administrador
unset($_SESSION['admin']);

// Redirige al usuario a la página de inicio de sesión o a donde desees
header("Location: login.php");
exit();
?>
