<?php

$id_usuario = isset($_SESSION['id']) ? $_SESSION['id'] : 'No se encontraron datos';

// Consulta SQL para obtener las citas del usuario actual
$sql = "SELECT c.id AS id_cita, 
c.id_usuario, 
c.mascota_id, 
c.tipo_servicio, 
c.fecha_cita, 
c.hora_cita,
m.nombre AS nombre_mascota,
m.tipo AS tipo_mascota, 
u.nombre AS nombre_cliente, 
u.apellido_paterno AS apellido_cliente
FROM tb_citas c
INNER JOIN tb_mascotas m ON c.mascota_id = m.id
INNER JOIN tb_usuarios u ON c.id_usuario = u.id
WHERE c.id_usuario = :id_usuario";

// Preparar la consulta
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$stmt->execute();

// Obtener todas las citas del usuario como un arreglo asociativo
$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);