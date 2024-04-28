<?php
include('../../config.php');

session_start(); //iniciamos la sesion para luego destruirla

if (isset($_SESSION["sesion email"])) 
{
session_destroy(); //destruimos todas las sesiones
header('Location: '. $URL.'/login'); //vuelve al login

}
