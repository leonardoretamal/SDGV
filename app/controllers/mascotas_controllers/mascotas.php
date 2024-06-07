<?php
// Consulta SQL para seleccionar todas las mascotas con toda la información del cliente
$sql = "SELECT tb_mascotas.*, 
               tb_usuarios.rut AS rut_cliente,
               tb_usuarios.nombre AS nombre_cliente,
               tb_usuarios.apellido_paterno AS apellido_paterno_cliente
        FROM tb_mascotas
        INNER JOIN tb_usuarios ON tb_mascotas.cliente_id = tb_usuarios.id";
$query = $pdo->prepare($sql);
$query->execute();

// Obtener todas las mascotas con información adicional del cliente como un array asociativo
$items = $query->fetchAll(PDO::FETCH_ASSOC);
