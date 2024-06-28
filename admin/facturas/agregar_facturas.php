<?php
include("../../app/config.php"); //para tener conexión a base de datos.
include("../../admin/layout/parte1.php");

// Verifica si el usuario tiene un rol permitido para acceder a esta página 
// siempre debajo de parte1.php porque la sesión está iniciada ahí 
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
);

// Verifica si el rol del usuario está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
?>

    <div class="container-fluid">
        <div class="alert alert-danger mt-3" role="alert">
            <h4 class="alert-heading">Acceso denegado</h4>
            <p>No tienes permisos suficientes para acceder a esta página. Por favor, contacta al administrador.</p>
        </div>
    </div>

<?php
    // Si el rol del usuario no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}

?>

<div class="container-fluid">
    <p class="fs-1 fw-bold text-center p-2">Ingreso de Factura</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="fs-3 text-center"><b>Datos de la Factura </b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envía formulario a controlador -->
                    <form id="formularioFicha" action="<?php echo $URL; ?>/app/controllers/facturas_controllers/ingresar_factura.php" method="post">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Cliente ID<b>*</b></label>
                                    <input type="text" name="cliente_id" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha<b>*</b></label>
                                    <input type="date" name="fecha" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Valor consulta<b>*</b></label>
                                    <input type="number" name="valor_consulta" id="valor_consulta" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">¿Operacion?<b>*</b></label>
                                <div class="form-group">
                                    <input type="radio" class="btn-check" value="1" name="operacion" id="primary-outlined" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="primary-outlined">Sí</label>
                                    <input type="radio" class="btn-check" value="0" name="operacion" id="secondary-outlined" autocomplete="off" checked>
                                    <label class="btn btn-outline-secondary" for="secondary-outlined">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Valor operación</label>
                                    <input type="text" name="valor_operacion" id="valor_operacion" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <!-- Input oculto para el total con name="total" -->
                        <input type="hidden" name="total" id="total_oculto">

                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <a href="../../admin/fichamedicas/showfichamedica.php" class="btn btn-secondary">Cancelar</a>
                                <button type="button" class="btn btn-primary" id="abrirModalTotal">Ingresar Factura</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTotal" tabindex="-1" aria-labelledby="modalTotalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTotalLabel">Total a Pagar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>El total a pagar es: <span id="mostrarTotal"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmarTotal">Confirmar</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#abrirModalTotal').click(function() {
            calcularTotal();
            $('#modalTotal').modal('show');
        });

        $('#confirmarTotal').click(function() {
            var total = calcularTotal();
            if (total !== null) {
                $('#total_oculto').val(total); // Asigna el valor total al input oculto solo si no es null
                $('#formularioFicha').submit(); // Envía el formulario
            }
        });

        var valorConsultaInput = $('#valor_consulta');
        var radioOperacion = $('input[name="operacion"]');
        var valorOperacionInput = $('#valor_operacion');
        var mostrarTotalSpan = $('#mostrarTotal');

        function calcularTotal() {
            var valorConsulta = valorConsultaInput.val().trim(); // Obtiene el valor de consulta y elimina espacios en blanco

            // Si valorConsulta está vacío y es un campo requerido, muestra el mensaje de error y retorna null
            if (valorConsulta === '' && valorConsultaInput.prop('required')) {
                valorConsultaInput.addClass('is-invalid');
                return null;
            } else {
                valorConsultaInput.removeClass('is-invalid');
            }

            // Convierte valorConsulta a número si no está vacío
            valorConsulta = valorConsulta === '' ? NaN : parseFloat(valorConsulta);

            // Verifica si valorConsulta es un número válido
            if (isNaN(valorConsulta)) {
                return null; // Retorna null si valorConsulta no es un número válido
            }

            var valorOperacion = 0;

            if (radioOperacion.filter(':checked').val() === '1') {
                valorOperacionInput.prop('disabled', false);
                valorOperacion = parseFloat(valorOperacionInput.val()) || 0; // Valor por defecto 0 si no es un número válido
            } else {
                valorOperacionInput.prop('disabled', 1).val('');
            }

            var total = valorConsulta + valorOperacion;
            if (isNaN(total)) {
                total = null; // Si total es NaN, retorna null
            }

            mostrarTotalSpan.text('$' + (total !== null ? total.toFixed(2) : ''));
            return total; // Retorna el total calculado o null si hay un error
        }

        valorConsultaInput.on('input', calcularTotal);
        radioOperacion.on('change', calcularTotal);
    });
</script>
<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>