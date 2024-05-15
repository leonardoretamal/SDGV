<?php   
echo $password="daniel";

echo md5($password)."<br>"; //encripta contraseñas
echo sha1($password)."<br>"; //encripta pero mas potente

echo password_hash($password, PASSWORD_DEFAULT)."\n"; //aun mas potente la da php y va cambiando con cada actualizacion

$hash ='$2y$10$7nSFtrgccaQ7Qib3yEN2/uvzjN1TLU5NI8Q3e2MCQ0yV1dz/x3ziC';

if (password_verify($password, $hash)) {
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}
