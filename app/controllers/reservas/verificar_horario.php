<?php

include('../../config.php');

$fecha = $_GET['fecha'];

$hora_cita = "";

$query = $pdo->prepare("SELECT * FROM tb_citas where fecha_cita = '$fecha' ");
$query->execute();

$datos = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos as $dato) {
    $hora_cita = $dato['hora_cita']; //rescatamos de la base de datos y lo guardamos en una varible

    $horario = ['08:00 - 09:00 am', '09:00 - 10:00 am', '10:00 - 11:00 am', '11:00 - 12:00 am', '12:00 - 13:00 pm', '14:00 - 15:00 pm', '15:00 - 16:00 pm', '16:00 - 17:00 pm'];
    for ($i = 0; $i < 8; $i++) {

        if ($horario[$i] == $hora_cita) {
            $num = $i + 1;
            $hora_res = "#btn_h" . $num;
            echo "<script> $('$hora_res').attr('disabled',true); $('$hora_res').css('background-color','#F1FAFE')</script>";
        }
    }
}
