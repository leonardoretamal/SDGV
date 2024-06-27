<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario
$cliente_id = $_POST["cliente_id"];
$fecha = $_POST["fecha"];
$valor_consulta = $_POST["valor_consulta"];
$operacion = $_POST["operacion"];
$valor_operacion = !empty($_POST["valor_operacion"]) ? $_POST["valor_operacion"] : 0;
$total = $_POST["total"];

// Verificar si es el mismo registro 
$sql = "SELECT * FROM tb_facturas WHERE cliente_id = :cliente_id AND fecha = :fecha AND total = :total";
$query = $pdo->prepare($sql);
$query->bindParam(':cliente_id', $cliente_id);
$query->bindParam(':fecha', $fecha);
$query->bindParam(':total', $total);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC);

session_start();

if (count($items) > 0) {
    $_SESSION['mensaje'] = "Factura ya está registrada en la base de datos: " . $fecha . "-" . $cliente_id . "-" . $total;
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/facturas/show_factura.php');
    exit();
} else {
    // Preparar y ejecutar la inserción en la base de datos
    $sentencia = $pdo->prepare("INSERT INTO tb_facturas (cliente_id, fecha, valor_consulta, operacion, valor_operacion, total, fyh_creacion) 
                                VALUES (:cliente_id, :fecha, :valor_consulta, :operacion, :valor_operacion, :total, :fyh_creacion)");

    $sentencia->bindParam(':cliente_id', $cliente_id);
    $sentencia->bindParam(':fecha', $fecha);
    $sentencia->bindParam(':valor_consulta', $valor_consulta);
    $sentencia->bindParam(':operacion', $operacion);
    $sentencia->bindParam(':valor_operacion', $valor_operacion);
    $sentencia->bindParam(':total', $total);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);

    if ($sentencia->execute()) {
        $_SESSION['mensaje'] = "Factura registrada correctamente";
        $_SESSION['icono'] = 'success';
    } else {
        $_SESSION['mensaje'] = "La factura no se pudo registrar";
        $_SESSION['icono'] = 'error';
    }

    header('Location: ' . $URL . '/admin/facturas/show_factura.php');
    exit();
}
