<?php

session_start(); //volvemos a habilitar la variable de sesion
if (isset($_SESSION["sesion email"])) {
    /* echo "Ha pasado por el login"; */
} else {
    //echo "no ha pasado por el login";
    header('Location: ' . $URL . '/login'); //vuelve al login
}

// Obtén el rol del usuario de la variable de sesión
$rol_usuario = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'No se encontraron datos';
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'No se encontraron datos';
$apellido_paterno=isset($_SESSION['apellido_paterno']) ? $_SESSION['apellido_paterno'] : 'No se encontraron datos';

// Verifica el rol del usuario y define las restricciones de visualización de las pestañas
$roles_permitidos = array(
    'ADMINISTRADOR' => array('Usuarios', 'Suministros', 'Mascotas', 'Facturas'),
    'Recepcionista' => array('Usuarios', 'Suministros', 'Mascotas', 'Facturas'),
    'Veterinario' => array('Suministros', 'Mascotas'),
    'Cliente' => array('Mascotas', 'Facturas')
);

// Verifica los ingresos permitidos según el rol del usuario
$ingresos_permitidos = array(
    'ADMINISTRADOR' => array('Usuarios', 'Suministros', 'Mascotas', 'Facturas'),
    'Recepcionista' => array('Usuarios', 'Suministros', 'Mascotas', 'Facturas'),
    'Veterinario' => array('Suministros', 'Mascotas'),
    'Cliente' => array() // Cliente no tiene ingresos permitidos
);

// Función para verificar si una pestaña está permitida para el rol actual del usuario
function esPestanaPermitida($pestana, $roles_permitidos, $rol_usuario)
{
    foreach ($roles_permitidos as $rol => $pestanas) {
        if ($rol_usuario == $rol && in_array($pestana, $pestanas)) {
            return true;
        }
    }
    return false;
}

// Función para verificar si un ingreso está permitido para el rol actual del usuario
function esIngresoPermitido($ingreso, $ingresos_permitidos, $rol_usuario)
{
    return in_array($ingreso, $ingresos_permitidos[$rol_usuario]);
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo APP_NAME; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <!-- jQuery -->
    <script src="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- iconos font awasome -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.es.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo $URL ?>/admin" class="nav-link"><?php echo APP_NAME; ?></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- Messages Dropdown Menu -->
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/index3.html" class="brand-link">
                <img src="https://cdn-icons-png.freepik.com/512/11810/11810009.png" alt="Administrador" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?php echo strtoupper($rol_usuario); ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <?php if (esPestanaPermitida('Usuarios', $roles_permitidos, $rol_usuario)) : ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa fa-users"></i>
                                    <p>
                                        Usuarios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $URL; ?>/admin/usuarios" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Lista de usuarios</p>
                                        </a>
                                    </li>
                                    <?php if (esIngresoPermitido('Usuarios', $ingresos_permitidos, $rol_usuario)) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo $URL; ?>/admin/usuarios/crear.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Agregar nuevo usuario</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (esPestanaPermitida('Suministros', $roles_permitidos, $rol_usuario)) : ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa fa-medkit"></i>
                                    <p>
                                        Suministros
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $URL; ?>/admin/suministros/show_suministro.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Suministros</p>
                                        </a>
                                    </li>
                                    <?php if (esIngresoPermitido('Suministros', $ingresos_permitidos, $rol_usuario)) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo $URL; ?>/admin/suministros/agregar_suministro.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Ingresar Suministros</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (esPestanaPermitida('Mascotas', $roles_permitidos, $rol_usuario)) : ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class='fas fa-paw'></i>
                                    <p>
                                        Mascotas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $URL; ?>/admin/mascotas/show_mascota.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Mascotas</p>
                                        </a>
                                    </li>
                                    <?php if (esIngresoPermitido('Mascotas', $ingresos_permitidos, $rol_usuario)) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo $URL; ?>/admin/mascotas/agregar_mascota.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Ingresar Mascotas</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (esPestanaPermitida('Facturas', $roles_permitidos, $rol_usuario)) : ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa fa-edit"></i>
                                    <p>
                                        Facturas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $URL; ?>/admin/facturas/show_factura.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Facturas</p>
                                        </a>
                                    </li>
                                    <?php if (esIngresoPermitido('Facturas', $ingresos_permitidos, $rol_usuario)) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo $URL; ?>/admin/mascotas/agregar_mascota.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Ingresar Facturas</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (esPestanaPermitida('Facturas', $roles_permitidos, $rol_usuario)) : ?>
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="fa fa-edit"></i>
                                    <p>
                                        Ficha Medica
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $URL; ?>/admin/fichamedicas/show_fichamedica.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Ficha Medica</p>
                                        </a>
                                    </li>
                                    <?php if (esIngresoPermitido('Facturas', $ingresos_permitidos, $rol_usuario)) : ?>
                                        <li class="nav-item">
                                            <a href="<?php echo $URL; ?>/admin/fichamedicas/agregar_fichamedica.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Ingresar Ficha Medica</p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>


                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>/app/controllers/login/cerrar_sesion.php" class="nav-link active" style="background-color: red;">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>
                                    Cerrar Sesion
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">