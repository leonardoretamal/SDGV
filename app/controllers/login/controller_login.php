<?php

include("../../config.php");
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

$contador = 0;

foreach ($usuarios as $usuario) {
  $contador = $contador + 1;
  $password_tabla = $usuario['password'];
  $rol = $usuario['rol'];
}

$hash = $password_tabla; //contrausuario
if (($contador > 0) && (password_verify($password, $hash))) {
  echo "Bienvenido al sistema";
  session_start(); //se crea la sesion
  $_SESSION['sesion email'] = $email; //copiamos la variable a otras vistas
  header('Location: '.$URL.'/admin');
} else {
  echo "error en los datos";
  header('Location: '. $URL.'/login');
}

