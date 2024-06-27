<?php

$id_usuario = isset($_SESSION['id']) ? $_SESSION['id'] : 'No se encontraron datos';

// Consulta SQL para obtener las mascotas del usuario actual
$sql = "SELECT m.*, u.rut AS rut_cliente, u.nombre AS nombre_cliente, u.apellido_paterno AS apellido_cliente
        FROM tb_mascotas m
        INNER JOIN tb_usuarios u ON m.cliente_id = u.id
        WHERE m.cliente_id = :id_usuario";
        
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$stmt->execute();
$mascotas = $stmt->fetchAll(PDO::FETCH_ASSOC);
