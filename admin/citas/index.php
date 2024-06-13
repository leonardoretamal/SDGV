<?php
include("../../app/config.php");
include("../../admin/layout/parte1.php");
?>
<script>
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
                var a = info.dateStr;
                const fechaComoCadena = a;
                var numeroDia = new Date(fechaComoCadena).getDay();
                var dias = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO',]


                if (numeroDia == "6") {
                    alert("No hay atencion disponible este dia.");
                }else{
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
                    <h3 class="card-title"><b>SUS CITAS</b></h3>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="modal_reservas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu cita para el dia <span id="dia_de_la_semana"></span></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="">

                                    </div>
                                    </div>
                                    <div class="col-md-6">sklkaasñk</div>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>