<?php

// Consulta para obtener los datos de la factura y el cliente asociado
$sql = "SELECT tf.*, tu.*
        FROM tb_facturas tf
        INNER JOIN tb_usuarios tu ON tf.cliente_id = tu.id
        WHERE tf.id = :id";

$query = $pdo->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

$factura_usuario = $query->fetch(PDO::FETCH_ASSOC);

if (!$factura_usuario) {
    // Manejo del caso donde no se encuentra la factura
    header('Location: ' . $URL . '/error404.php');
    exit;
}

// Asignación de variables para mostrar en la vista
$factura_id = $factura_usuario['id'];
$factura_fecha = $factura_usuario['fecha'];
$factura_total = $factura_usuario['total'];
$factura_valor_consulta = $factura_usuario['valor_consulta'];
$factura_operacion = $factura_usuario['operacion'];
$factura_valor_operacion = $factura_usuario['valor_operacion'];
$factura_fyh_creacion = $factura_usuario['fyh_creacion'];
$factura_fyh_actualizacion = $factura_usuario['fyh_actualizacion'];

$cliente_id = $factura_usuario['cliente_id'];
$cliente_rut = $factura_usuario['rut'];
$cliente_nombre = $factura_usuario['nombre'];
$cliente_apellido_paterno = $factura_usuario['apellido_paterno'];
$cliente_apellido_materno = $factura_usuario['apellido_materno'];
$cliente_direccion = $factura_usuario['direccion'];
$cliente_telefono = $factura_usuario['telefono'];
$cliente_email = $factura_usuario['email'];
$cliente_rol = $factura_usuario['rol'];
$cliente_fyh_creacion = $factura_usuario['fyh_creacion'];
$cliente_fyh_actualizacion = $factura_usuario['fyh_actualizacion'];