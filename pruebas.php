<?php   
echo $password="daniel"; //creacion variable que tiene la contraseña

echo md5($password)."<br>"; //encripta contraseñas md5
echo sha1($password)."<br>"; //encripta pero mas potente

echo password_hash($password, PASSWORD_DEFAULT)."\n"; //aun mas potente la da php y va cambiando con cada actualizacion

$hash ='$2y$10$7nSFtrgccaQ7Qib3yEN2/uvzjN1TLU5NI8Q3e2MCQ0yV1dz/x3ziC'; //dentro de las comillas va el hash 

if (password_verify($password, $hash)) { //if para verificar coincidencia de la contraseña y el hash password_verify es una funcion de php
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}
