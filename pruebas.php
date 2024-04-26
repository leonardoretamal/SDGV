<?php   
echo $password="12345678";

echo md5($password)."<br>"; //encripta contraseñas
echo sha1($password)."<br>"; //encripta pero mas potente

echo password_hash($password, PASSWORD_DEFAULT)."\n"; //aun mas potente la da php y va cambiando con cada actualizacion

$hash ='$2y$10$zvxoPv4XhsDmFGNuGsDO7O2GrWhff0LjlXOAkGdWhYvALdXjlQCwC';

if (password_verify($password, $hash)) {
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}
