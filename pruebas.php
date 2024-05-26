<?php   
echo $password="123456"; //creacion variable que tiene la contraseña

echo md5($password)."<br>"; //encripta contraseñas md5
echo sha1($password)."<br>"; //encripta pero mas potente

echo password_hash($password, PASSWORD_DEFAULT)."\n"; //aun mas potente la da php y va cambiando con cada actualizacion

$hash ='$2y$10$vjfnxvnJW.Ni6Qtx5WyJkO7FOuyoe8zvUB2oTZzGCgKQYmNaoVRXS'; //dentro de las comillas va el hash 

if (password_verify($password, $hash)) { //if para verificar coincidencia de la contraseña y el hash password_verify es una funcion de php
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}
