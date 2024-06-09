<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

// Verificar si el usuario tiene un rol permitido para acceder a esta página
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista'
);

// Verifica si el rol del usuario está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
    // Si el rol del usuario no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}

$id_usuario = $_GET['id_usuario'];
include('../../app/controllers/usuarios/datos_del_usuario.php');
?>


<div class="container-fluid">
    <h1>Actualizacion del usuario <?php echo $nombre;?> <?php echo $apellido_paterno; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <p class="h3 text-center"><b>datos del usuario </b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <form action="../../app/controllers/usuarios/update.php" method="post"> <!-- mas seguro -->

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Rut<b>*</b></label>
                                    <input type="text" name="rut" value="<?php echo $rut; ?>" class="form-control" required maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombres<b>*</b></label>
                                    <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Apellido Paterno<b>*</b></label>
                                    <input type="text" name="apellido_paterno" value="<?php echo $apellido_paterno; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Apellido Materno </label>
                                    <input type="text" name="apellido_materno" value="<?php echo $apellido_materno; ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Direccion</label>
                                    <input type="text" name="direccion" value="<?php echo $direccion; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Correo Electronico<b>*</b></label>
                                    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Rol<b>*</b></label>
                                    <select name="rol" id="" class="form-control" required>
                                        <?php
                                        if ($rol == "ADMINISTRADOR") { ?>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Recepcionista">Recepcionista</option>
                                            <option value="Veterinario">Veterinario</option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($rol == "Cliente") { ?>
                                            <option value="Cliente">Cliente</option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="Recepcionista">Recepcionista</option>
                                            <option value="Veterinario">Veterinario</option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($rol == "Recepcionista") { ?>
                                            <option value="Recepcionista">Recepcionista</option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Veterinario">Veterinario</option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($rol == "Veterinario") { ?>
                                            <option value="Veterinario">Veterinario</option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Recepcionista">Recepcionista</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Contraseña <b>*</b></label>
                                    <input type="text" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Verifique contraseña <b>*</b></label>
                                    <input type="text" name="password_verify" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                        <hr class="border-success">
                        <div class="row justify-content-center"> <!-- Alineación horizontal centrada -->
                            <div class="col-md-12 text-center"> <!-- Centrado horizontal -->
                                <a href="../../admin/usuarios/index.php" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" class="btn btn-success" value="Actualizar usuario" required>
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

<script>
    // Función para validar RUT chileno
    function validarRUT(rut) {
        // Eliminar puntos y guión y cualquier otro carácter que no sea número ni 'k'
        rut = rut.replace(/[^0-9kK]/gi, '');

        // Verificar longitud
        if (rut.length < 8 || rut.length > 9) return false;

        // Extraer cuerpo y dígito verificador
        var cuerpo = rut.slice(0, -1);
        var dv = rut.slice(-1).toUpperCase();

        // Calcular dígito verificador
        var suma = 0;
        var multiplicadores = [2, 3, 4, 5, 6, 7];
        var cuerpoReverso = cuerpo.split('').reverse().join('');

        for (var i = 0; i < cuerpoReverso.length; i++) {
            suma += parseInt(cuerpoReverso[i]) * multiplicadores[i % multiplicadores.length];
        }

        var mod = suma % 11;
        var dvCalculado = (mod === 0) ? '0' : (mod === 1) ? 'K' : (11 - mod).toString();

        // Comparar dígito verificador calculado con el ingresado
        return dv === dvCalculado;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var rutInput = document.getElementById('rut');
        
        rutInput.addEventListener('input', function(event) {
            var inputValue = event.target.value;
            // Reemplazar cualquier carácter que no sea un número o 'k'/'K' con una cadena vacía
            var cleanedValue = inputValue.replace(/[^0-9kK-]/gi, '');
            // Asignar el valor limpio al campo de texto
            rutInput.value = cleanedValue;
        });

        var formulario = document.querySelector('form');

        formulario.addEventListener('submit', function(event) {
            if (!validarRUT(rutInput.value)) {
                event.preventDefault();
                alert('El RUT ingresado no es válido.');
                rutInput.focus();
            }
        });
    });
</script>
<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>