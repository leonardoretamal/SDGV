<?php

$sql = "SELECT * FROM tb_fichamedica";
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$fichas = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

//consulta que nos trae el listado 