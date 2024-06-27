<?php

$id_usuario = isset($_SESSION['id']) ? $_SESSION['id'] : 'No se encontraron datos';

// Consulta SQL para obtener las facturas del usuario
$sql = "SELECT 
f.id AS factura_id,
f.fecha AS factura_fecha,
f.total AS factura_total,
f.valor_consulta AS factura_valor_consulta,
f.operacion AS factura_operacion,
f.valor_operacion AS factura_valor_operacion,
u.id AS usuario_id,
u.rut AS usuario_rut,
u.nombre AS usuario_nombre,
u.apellido_paterno AS usuario_apellido_paterno,
u.apellido_materno AS usuario_apellido_materno,
u.direccion AS usuario_direccion,
u.telefono AS usuario_telefono,
u.email AS usuario_email
FROM tb_facturas f
INNER JOIN tb_usuarios u ON f.cliente_id = u.id
WHERE u.id = :id_usuario";

$query = $pdo->prepare($sql);
$query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$query->execute();
$facturas_cliente = $query->fetchAll(PDO::FETCH_ASSOC);
