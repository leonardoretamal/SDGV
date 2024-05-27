<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario
$rut = $_POST["rut"];
$nombre = $_POST["nombre"];
$apellido_paterno = $_POST["apellido_paterno"];
$apellido_materno = $_POST["apellido_materno"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$rol = $_POST["rol"];
$password = $_POST["password"];
$password_verify = $_POST["password_verify"];


// Verificar si el usuario ya está registrado
$sql = "SELECT * FROM tb_usuarios WHERE email = :email OR rut = :rut";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email);
$query->bindParam(':rut', $rut);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($usuarios) > 0) {
    session_start();
    $_SESSION['mensaje'] = "Este usuario ya está registrado en la base de datos: " . $email;
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/usuarios/crear.php');
    exit();
} else {
    if ($password == $password_verify) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT); // Encriptar la contraseña
        $fechaHora = date('Y-m-d H:i:s'); // Fecha y hora actual

        // Preparar y ejecutar la inserción en la base de datos
        $sentencia = $pdo->prepare("INSERT INTO tb_usuarios (rut, nombre, apellido_paterno, apellido_materno, direccion, telefono, email, rol, password, fyh_creacion) 
                                     VALUES (:rut, :nombre, :apellido_paterno, :apellido_materno, :direccion, :telefono, :email, :rol, :password, :fyh_creacion)");
        $sentencia->bindParam(':rut', $rut);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellido_paterno', $apellido_paterno);
        $sentencia->bindParam(':apellido_materno', $apellido_materno);
        $sentencia->bindParam(':direccion', $direccion);
        $sentencia->bindParam(':telefono', $telefono);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':rol', $rol);
        $sentencia->bindParam(':password', $password_hashed);
        $sentencia->bindParam(':fyh_creacion', $fechaHora);

        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Usuario registrado correctamente";
            $_SESSION['icono'] = 'success';
            header('Location: ' . $URL . '/admin/usuarios');
            exit();
        } else {
            session_start();
            $_SESSION['mensaje'] = "El usuario no se pudo registrar";
            $_SESSION['icono'] = 'error';
            header('Location: ' . $URL . '/admin/usuarios/crear.php');
            exit();
        }
    } else {
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas no son iguales";
        $_SESSION['icono'] = 'error';
        header('Location: ' . $URL . '/admin/usuarios/crear.php');
        exit();
    }
}
