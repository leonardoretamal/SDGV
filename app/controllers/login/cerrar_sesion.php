<?php
include('../../config.php');

session_start(); // Iniciamos la sesión para luego destruirla

if (isset($_SESSION["sesion email"])) {
    session_unset(); // Limpiamos todas las variables de sesión
    session_destroy(); // Destruimos la sesión
    header('Location: '. $URL.'/login'); // Redirige al inicio de sesión
    exit; // Asegura que no se ejecute más código después de la redirección
}
