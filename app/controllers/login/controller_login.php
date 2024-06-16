<?php
session_start(); // Inicia la sesión antes de realizar cualquier operación con $_SESSION

include("../../config.php");
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_usuarios WHERE email = :email";
$query = $pdo->prepare($sql);
$query->execute(array(':email' => $email));

$usuario = $query->fetch(PDO::FETCH_ASSOC); // Utiliza fetch en lugar de fetchAll, ya que solo necesitamos un usuario

if ($usuario) {
  $password_tabla = $usuario['password'];
  $rol = $usuario['rol'];
  $nombre = $usuario['nombre'];
  $apellido_paterno = $usuario['apellido_paterno'];
  $id_usuario = $usuario['id'];

  if (password_verify($password, $password_tabla)) {
    echo "Bienvenido al sistema";
    $_SESSION['sesion_email'] = $email;
    $_SESSION['rol'] = $rol;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido_paterno'] = $apellido_paterno;
    $_SESSION['id'] = $id_usuario;
    header('Location: ' . $URL . '/admin');
    exit; // Importante: detener la ejecución después de redirigir
  } else {
    echo "Error en los datos";
    header('Location: ' . $URL . '/login');
    exit; // Importante: detener la ejecución después de redirigir
  }
} else {
  echo "Usuario no encontrado";
  header('Location: ' . $URL . '/login');
  exit; // Importante: detener la ejecución después de redirigir
}
