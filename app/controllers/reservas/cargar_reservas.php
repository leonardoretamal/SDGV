<?php
include("../../config.php");

$sql = "Select title,start,end,color FROM tb_citas";
$query = $pdo->prepare($sql);
$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
/* print_r($resultado); */
echo json_encode($resultado);