<?php  
include("../../../app/config.php"); //para tener conexion a base de datos.
//vienen del formulario 
$nombre_completo = $_POST["nombre_completo"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_verify = $_POST["password_verify"];
$cargo = $_POST["cargo"];
$fecha="2024-04-28";
//siempre comprobar poniendo echo antes luego se prosigue con lo siguiente

if($password == $password_verify) {
   //echo "son iguales";
   $password = password_hash($password, PASSWORD_DEFAULT); //encriptamos la contraseña luego de verificarlas

    $sentencia = $pdo ->prepare("INSERT INTO tb_usuarios (nombre_completo,email,password,cargo,fyh_creacion)
                                VALUES (:nombre_completo,:email,:password,:cargo,:fyd_creacion) "); //pasador por parametros

    $sentencia->bindParam('nombre_completo',$nombre_completo);
    $sentencia->bindParam('email',$email);
    $sentencia->bindParam('password',$password);
    $sentencia->bindParam('cargo',$cargo);
    $sentencia->bindParam('fyd_creacion',$fecha);
    $sentencia->execute(); //ejecutamos la consulta

} else{
    echo "no son iguales las contraseñas";
}