<?php
include("../../app/config.php");
include("../../admin/layout/parte1.php");
?>
<script>
    var a;
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
                if (numeroDia == 6) { // 6 representa sábado
                    alert("No hay atención disponible este día.");
                } else {
                    $('#modal_reservas').modal("show");
                    $('#dia_de_la_semana').html(dias[numeroDia] + " " + a);
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
                <div class="modal fade" id="modal_reservas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu cita para el día <span id="dia_de_la_semana"></span></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
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
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h6">13:00 - 14:00 pm</button>
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h7">14:00 - 15:00 pm</button>
                                            <button class="btn btn-info" type="button" data-bs-dismiss="modal" id="btn_h8">16:00 - 17:00 pm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade" id="modal_formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div  class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu cita para el día <span id="dia_de_la_semana"></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id_mascota">ID Mascota</label>
                                    <input type="text" class="form-control" id="id_mascota">
                                </div>
                                <div class="col-md-6">
                                    <label for="tipo_servicio">Tipo de servicio</label>
                                    <select name="tipo_servicio" id="tipo_servicio" class="form-control">
                                        <option value="lavado">Lavado</option>
                                        <option value="servicio_2">Servicio 2</option>
                                        <option value="servicio_3">Servicio 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fecha_reserva">Fecha de reserva</label>
                                    <input type="text" class="form-control" id="fecha_reserva" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_reserva">Hora de reserva</label>
                                    <input type="text" class="form-control" id="hora_reserva" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                var hora1 = "08:00 - 09:00 am"
                $('#hora_reserva').val(hora1);
            });
        });
    </script>

    <?php
    include("../../admin/layout/parte2.php");
    include("../../admin/layout/mensaje.php");
    ?>