<?php  
include("../../../app/config.php"); //para tener conexion a base de datos.
//vienen del formulario 
$nombre_completo = $_POST["nombre_completo"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_verify = $_POST["password_verify"];
$cargo = $_POST["cargo"];
//siempre comprobar poniendo echo antes luego se prosigue con lo siguiente

$contador = 0;
$sql = "SELECT * FROM tb_usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

foreach($usuarios as $usuario){
    $contador ++; //se suma a si mismo si es un true
}
//para insertar solamente si el correo no esta registrado y comprobando que haya escrito bien las contraseñas en ek formulario
if($contador > 0){
 echo "este usuario ya esta registrado en la base de datos";
} else{
    echo "este usuario es nuevo";

    //consulta que nos trae el listado de usuarios a $usuarios
    if($password == $password_verify) {
    //echo "son iguales";
    $password = password_hash($password, PASSWORD_DEFAULT); //encriptamos la contraseña luego de verificarlas
 
     $sentencia = $pdo ->prepare("INSERT INTO tb_usuarios (nombre_completo,email,password,cargo,fyh_creacion)
                                 VALUES (:nombre_completo,:email,:password,:cargo,:fyd_creacion) "); //pasador por parametros
 
     $sentencia->bindParam('nombre_completo',$nombre_completo);
     $sentencia->bindParam('email',$email);
     $sentencia->bindParam('password',$password);
     $sentencia->bindParam('cargo',$cargo);
     $sentencia->bindParam('fyd_creacion',$fechaHora);
     $resultado = $sentencia->execute(); //ejecutamos la consulta
 
      if($resultado){
         echo "usuario registrado";
         header('Location: '.$URL.'/admin/usuarios');
         } else{
             echo "Error no pudo registrase en la base de datos.";
         }
 
 } else{
     echo "no son iguales las contraseñas";
 }
}


