<?php
include("../../app/config.php");
include("../../admin/layout/parte1.php");
?>
<script>
    var a;
    var email_sesion = '<?php echo $email ?>';
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            editable: true,
            selectable: true,
            allDaySlot: false,
            events: '../../app/controllers/reservas/cargar_reservas.php',
            dateClick: function(info) {
                a = info.dateStr;
                const fechaComoCadena = a;
                var numeroDia = new Date(fechaComoCadena).getDay();
                var dias = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', ];

                if (email_sesion == '') {
                    $('#modal_sesion').modal("show");
                } else {
                    if (numeroDia == 6) { // 6 representa domingo
                        alert("No hay atención disponible este día.");
                    } else {

                        var ano = new Date().getFullYear();
                        var mes = new Date().getMonth() + 1;
                        var dia = new Date().getDate();
                        // Agregar un 0 delante del mes si es menor de 10
                        if (mes < 10) {
                            mes = "0" + mes;
                        }
                        // Agregar un 0 delante del día si es menor de 10
                        if (dia < 10) {
                            dia = "0" + dia;
                        }
                        var hoy = ano + "-" + mes + "-" + dia;

                        if (hoy < a) {
                            $('#modal_reservas').modal("show");
                            $('#dia_de_la_semana').html(dias[numeroDia] + " " + a);

                            var fecha = info.dateStr;

                            var res = "";
                            var url = "<?php echo $URL ?>/app/controllers/reservas/verificar_horario.php";

                            $.get(url, {
                                fecha: fecha
                            }, function(datos) { //consulta ajax estamos mezclando java con php para no refrescar la pagina

                                res = datos;
                                $('#respuesta_horario').html(res);

                            });

                        } else {
                            alert("Dia no disponible para reserva");
                        }


                    }
                }



            },
        });
        calendar.render();
    });
</script>

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>CITAS</b></h3>
                </div>

                <div class="card-body">
                    <div id='calendar'></div>
                </div>



                <!-- Modal -->
                <div class="modal fade" id="modal_reservas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p class="fs-3 text-center">Reserva tu cita</p>
                                <hr>
                                <div class="row">
                                    <div id="respuesta_horario"></div>
                                    <div class="col-md-6">
                                        <p class="text-center fw-bold fs-5">Horas en la mañana</p>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h1">08:00 - 09:00 am</button>
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h2">09:00 - 10:00 am</button>
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h3">10:00 - 11:00 am</button>
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h4">11:00 - 12:00 am</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-center fw-bold fs-5">Horas en la tarde</p>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h5">12:00 - 13:00 pm</button>
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h6">14:00 - 15:00 pm</button>
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h7">15:00 - 16:00 pm</button>
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h8">16:00 - 17:00 pm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="" class="btn btn-primary">Escoger otra fecha</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal sesion -->
    <div class="modal fade" id="modal_sesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu cita para el día <span id="dia_de_la_semana"></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="fs-3">Para reservar una cita debes Iniciar Sesion primero.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade" id="modal_formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu cita para el día <span id="dia_de_la_semana"></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo $URL ?>/app/controllers/reservas/controller_reservas.php" method="post">
                    <div class="modal-body">
                        <div class="row">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nombre del usuario</label>
                                    <input type="text" class="form-control" value="<?php echo $nombre ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label>Apellido del usuario</label>
                                    <input type="text" class="form-control" value="<?php echo $apellido_paterno ?>" disabled>
                                </div>
                                <div class="col-md-12">
                                    <label>Correo electronico del usuario</label>
                                    <input type="text" class="form-control" value="<?php echo $email ?>" disabled>
                                    <input type="text" name="id_usuario" value="<?php echo $id_usuario ?>" hidden>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Fecha de reserva</label>
                                    <input type="text" class="form-control" id="fecha_reserva" disabled>
                                    <input type="text" name="fecha_cita" class="form-control" id="fecha_reservaCopia" hidden>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Hora de reserva</label>
                                    <input type="text" class="form-control" id="hora_reserva" disabled>
                                    <input type="text" name="hora_cita" class="form-control" id="hora_reservaCopia" hidden>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>ID Mascota</label>
                                    <input type="text" name="mascota_id" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Nombre mascota</label>
                                    <input type="text" name="nombre_mascota" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="tipo_servicio">Tipo de servicio</label>
                                    <select name="tipo_servicio" id="tipo_servicio" class="form-control">
                                        <option value="Lavado">Lavado</option>
                                        <option value="Servicio 2">Servicio 2</option>
                                        <option value="Servicio 3">Servicio 3</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Cita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#btn_h1').click(function() {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reservaCopia').val(a);
            var hora1 = "08:00 - 09:00 am"
            $('#hora_reserva').val(hora1);
            $('#hora_reservaCopia').val(hora1);
        });
    });
    $(document).ready(function() {
        $('#btn_h2').click(function() {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reservaCopia').val(a);
            var hora2 = "09:00 - 10:00 am"
            $('#hora_reserva').val(hora2);
            $('#hora_reservaCopia').val(hora2);
        });
    });
    $(document).ready(function() {
        $('#btn_h3').click(function() {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reservaCopia').val(a);
            var hora3 = "10:00 - 11:00 am"
            $('#hora_reserva').val(hora3);
            $('#hora_reservaCopia').val(hora3);
        });
    });
    $(document).ready(function() {
        $('#btn_h4').click(function() {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reservaCopia').val(a);
            var hora4 = "11:00 - 12:00 am"
            $('#hora_reserva').val(hora4);
            $('#hora_reservaCopia').val(hora4);
        });
    });
    $(document).ready(function() {
        $('#btn_h5').click(function() {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reservaCopia').val(a);
            var hora5 = "12:00 - 13:00 pm"
            $('#hora_reserva').val(hora5);
            $('#hora_reservaCopia').val(hora5);
        });
    });
    $(document).ready(function() {
        $('#btn_h6').click(function() {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reservaCopia').val(a);
            var hora6 = "14:00 - 15:00 pm"
            $('#hora_reserva').val(hora6);
            $('#hora_reservaCopia').val(hora6);
        });
    });
    $(document).ready(function() {
        $('#btn_h7').click(function() {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reservaCopia').val(a);
            var hora7 = "15:00 - 16:00 pm"
            $('#hora_reserva').val(hora7);
            $('#hora_reservaCopia').val(hora7);
        });
    });
    $(document).ready(function() {
        $('#btn_h8').click(function() {
            $('#modal_formulario').modal("show");
            $('#fecha_reserva').val(a);
            $('#fecha_reservaCopia').val(a);
            var hora8 = "16:00 - 17:00 pm"
            $('#hora_reserva').val(hora8);
            $('#hora_reservaCopia').val(hora8);
        });
    });
</script>

<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>