<?php 
    include("keys.php");
    include("../../../app/config.php");

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $manesaje = $_POST['mensaje'];
    $token = $_POST['token'];

    $url = "https://www.google.com/recaptcha/api/siteverify";

    $respuesta = file_get_contents("$url?secret=$claves[privada]&response=$token");

    $json = json_decode($respuesta, true);

    $true = $json['success']; //true si sale ok, false si sale mal

    if ($true === false) {
        header('location:' . $URL . '/index.php?error=Error en el captcha');
        die();
    }

    if ($json['score'] < 0.7) {
        header('location:' . $URL . '/index.php?error=Los robots no pueden interactuar con nuestro sistema');
        die();
    }
?>