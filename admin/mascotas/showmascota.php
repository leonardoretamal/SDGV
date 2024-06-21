<?php
include("../../app/config.php"); //para tener conexión a la base de datos.
include("../../admin/layout/parte1.php");

$id = $_GET['id'];
include('../../app/controllers/mascotas_controllers/datos_mascota_controller.php');

?>

<div class="container-fluid">
    <br>
    <h1>Datos de la mascota: <?php echo ucfirst(strtolower($mascota_nombre)); ?></h1>
    <h1>ID: <?php echo $mascota_id; ?></h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title mt-1 fw">Datos Registrados</h3>
            <div class="card-tools">
                <button class="btn btn-primary btn-sm" onclick="generarReporte()">Generar Reporte</button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_id; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_nombre; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_tipo; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Raza:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_raza; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Edad:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_edad; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Sexo:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_sexo; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Color:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_color; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Peso:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_peso; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Altura:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_altura; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Nacimiento:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_fecha_nacimiento; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Cliente ID:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_id; ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>RUT del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_rut; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nombre del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_nombre; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Apellido Paterno del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_apellido_paterno; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Apellido Materno del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_apellido_materno; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Dirección del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_direccion; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Teléfono del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_telefono; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email del Cliente:</label>
                        <input type="email" class="form-control" value="<?php echo $cliente_email; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Rol del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_rol; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Creación mascota:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_fyh_creacion; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Actualización mascota:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_fyh_actualizacion ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Div para mostrar el reporte -->
    <div id="reportePDF"></div>
</div>

<script>
    function generarReporte() {

        // Obtener el nombre de la mascota desde PHP y utilizarlo en el nombre del archivo
        var nombreMascota = '<?php echo addslashes($mascota_nombre); ?>'; // addslashes para escapar caracteres especiales
        var nombreArchivo = 'Reporte_mascota_' + nombreMascota + '.pdf';

        var mascota_id = "<?php echo $mascota_id; ?>";
        var mascota_tipo = "<?php echo $mascota_tipo; ?>";
        var mascota_raza = "<?php echo $mascota_raza; ?>";
        var mascota_edad = "<?php echo $mascota_edad; ?>";
        var mascota_sexo = "<?php echo $mascota_sexo; ?>";
        var mascota_color = "<?php echo $mascota_color; ?>";
        var mascota_peso = "<?php echo $mascota_peso; ?>";
        var mascota_altura = "<?php echo $mascota_altura; ?>";
        var mascota_fecha_nacimiento = "<?php echo $mascota_fecha_nacimiento; ?>";

        var cliente_id = "<?php echo $cliente_id; ?>";
        var cliente_rut = "<?php echo $cliente_rut; ?>";
        var cliente_nombre = "<?php echo $cliente_nombre; ?>";
        var cliente_apellido_paterno = "<?php echo $cliente_apellido_paterno; ?>";
        var cliente_apellido_materno = "<?php echo $cliente_apellido_materno; ?>";
        var cliente_direccion = "<?php echo $cliente_direccion; ?>";
        var cliente_telefono = "<?php echo $cliente_telefono; ?>";
        var cliente_email = "<?php echo $cliente_email; ?>";

        console.log("Generando reporte...");
        var doc = new jsPDF()

        //imagenbase64
        var base64Img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAAH0CAYAAADL1t+KAAAAAXNSR0IArs4c6QAAAARzQklUCAgICHwIZIgAAAAJcEhZcwAADsQAAA7EAZUrDhsAAASBaVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pgo8eDp4bXBtZXRhIHhtbG5zOng9J2Fkb2JlOm5zOm1ldGEvJz4KPHJkZjpSREYgeG1sbnM6cmRmPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjJz4KCiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0nJwogIHhtbG5zOkF0dHJpYj0naHR0cDovL25zLmF0dHJpYnV0aW9uLmNvbS9hZHMvMS4wLyc+CiAgPEF0dHJpYjpBZHM+CiAgIDxyZGY6U2VxPgogICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSdSZXNvdXJjZSc+CiAgICAgPEF0dHJpYjpDcmVhdGVkPjIwMjQtMDUtMDY8L0F0dHJpYjpDcmVhdGVkPgogICAgIDxBdHRyaWI6RXh0SWQ+OTU1ZTc4NGQtZmQwZS00ZjNlLWE3ZjUtMzkwM2ZmYTRmZTZlPC9BdHRyaWI6RXh0SWQ+CiAgICAgPEF0dHJpYjpGYklkPjUyNTI2NTkxNDE3OTU4MDwvQXR0cmliOkZiSWQ+CiAgICAgPEF0dHJpYjpUb3VjaFR5cGU+MjwvQXR0cmliOlRvdWNoVHlwZT4KICAgIDwvcmRmOmxpPgogICA8L3JkZjpTZXE+CiAgPC9BdHRyaWI6QWRzPgogPC9yZGY6RGVzY3JpcHRpb24+CgogPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9JycKICB4bWxuczpkYz0naHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8nPgogIDxkYzp0aXRsZT4KICAgPHJkZjpBbHQ+CiAgICA8cmRmOmxpIHhtbDpsYW5nPSd4LWRlZmF1bHQnPkxvZ29fU0RHViAtIDI8L3JkZjpsaT4KICAgPC9yZGY6QWx0PgogIDwvZGM6dGl0bGU+CiA8L3JkZjpEZXNjcmlwdGlvbj4KCiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0nJwogIHhtbG5zOnBkZj0naHR0cDovL25zLmFkb2JlLmNvbS9wZGYvMS4zLyc+CiAgPHBkZjpBdXRob3I+Sk9TRSBBTEVKQU5EUk8gTUFMRE9OQURPIEFSVEVBR0E8L3BkZjpBdXRob3I+CiA8L3JkZjpEZXNjcmlwdGlvbj4KCiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0nJwogIHhtbG5zOnhtcD0naHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyc+CiAgPHhtcDpDcmVhdG9yVG9vbD5DYW52YTwveG1wOkNyZWF0b3JUb29sPgogPC9yZGY6RGVzY3JpcHRpb24+CjwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9J3InPz7r+ArNAAAgAElEQVR4nOzdd3hUZdoG8PvMZFInvfdAgNB7R6ooVuxYUVddXTt2xcauuxYs6/qpa3cVXV2l2MUCCgoKSK8BQnrvmZLp5/tjJiFlTphMpmQO9++6vDDJzJl3Qsh93va8giiKIoiIiCigKfzdACIiIuo7BjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDLAQCciIpIBBjoREZEMMNCJiIhkgIFOREQkAwx0IiIiGWCgExERyQADnYiISAYY6ERERDIQ5O8GUP9zuMWAWqMFLSYrWsxWNJvs/99sssJktSFapUS0SonYkCBEq5SICQlCZkQwsiJD/N10lzXozWjQmlGvM6FOa0K91owGnRlWmwgFgLSYUGQnhGFEmhqRofxnQkT9H39TEXQWG36v1+KPBj221+ugsdgg2myAKMBmswEQOnwsAgBEmwiIgE20/ynaRMSHBmFiohqTktSYmKxGbEj/+fE6VK3DhiMN2HysCVuLmqEzWAA43gdgf1+i849To0MxMkON2XnxmJUXh7xUtd/eBxGRFEEURdHfjSD/2Naow4/VGmyq00IUj4e0KIr2jzuEdY8ftz3HBqDDcwdEhuK83DicMzAOoUrfz+5UNBvx+d4afL6nBodrdB3a7Win7fh7Pd5uJ9+HLh8PTo7AZVPTcOmUNKTEBM6oBBHJGwP9JLS+VoMVJQ2oN1m69EwdPfL2sO7YQ3f0yDt+DMBm7dBjh/OebkSQEhcMisdlQxMR54Ph61V7qrF6dzW2FLdAtNoc76vLyEIPIw3H34djZKLtYwjdrjd/RAIWn5KBc8cne/19ERH1hIF+EtnV0op3i+tRpDNBRFuYOe+ZjooOQ646BKlhKmSEByMmOAjRwUrEhwSh2WRFg9GCeoMZdQYL6lrNONTYih01WmhNVkeP11lPXsTC3HhcNyoZyRHBHn9/64404MkfC1HS0Aqg55GFEKUCiepgJKmDkeD4MyosCM16Mxp1ZjTpzSis1aOwtrU95Hu6Xk5COP65eATmjkjw+PsiInIFA/0k8UZJPb6tbpHoido/nhIfgVMS1Jgar0Z4kHtD5PmNrdhZq8O2ag22VGqcvk54kBJ3TkzHeYPjPfLeqrUmPPT1EWwqbHb0qNtGGoT28I0KUWL6wFhMzY7G1AExGJwU7tK1NQYLdpW0YGdRM3aVtGDd/jroDFYnIxf293nuuGQ8t3gEh+KJyOcY6DJXYTBj+bEaFOtNXeaKRQRDwISYcMyIV2NyXLjH57lLNEa8t78G3xY2OO3ZTkuLxOMzc/o0DP/FgVr89ftj0BmtTue8Lx6TjMWT0zAixTML2QxmG77cUYUVm8rx66H67u8LQESwEn9bNBR/PjXbI69JROQKBrqM7dK04pmCGhhtYrc579nxatyYkwC1mz3x3qjQmfCfvdX4sqDB0bNtC10BUcEKPH5KDmZmRff6uo//cAyf7KoC0HXOW8Cpg+Nw37wcDIwP8+Rb6aS0vhVv/VSCl9YWdpuTF0URp45KxIrbxiMyrP+s9ici+WKgy9TXdRq8U1bfZa4XiAlS4LYBiZgY49qQsycdbWrF0g1FKG42dFtFvmh4Eu6flunSdVrNNtz11WFsPNbYrUc+JSsa983NwSgfbi07XKnDHe/txW+HGx3f6+Or/wckhuPTeyZhaDq3uhGRdzHQZeg/FY34qral22ru+QmRuC4zDmF+2ELWxmS14YVt5VidX9upR22z2TAvJxbPzs/t8fl6sxU3rj6EHeUtndYCBCsEPHraQFw82n+rzd/fWIpH/ncITTpzpzUD0eEqfLN0KsYO6P0oBBGRqxjoMvOfykZ8XdvSbW53yYBEzIrrP73EDSXNWPZLkX1VvO34XvCxyWq8dMZgRAQruz2n1WzDDasPYleFplMPPzMqBK9fPAwD4rw3vO6q8gYDLnx+Kw6Uajrtz48MDcLXS6di4qAYfzeRiGSKgS4jK6qa8EVtM7quvl6Sk4hZcRH+bl431ToTbv3uCIqajJ3m+IclhOPd84YipMP8vtFiw42fHcL2spZO+8ZPHxyHp84cjDBV/zmWQG+0YvHLO/DdrppOW95iI4Lxyz9OwcDk/vd3QUSBr//8FqQ++apegy/rWyAIgqMUGiBCxAMDk/plmANAckQw3jk7D8PiwyAIAEQRggAcrNPhkfWFnR778A/HsKNCAwCwl3gRcMnoZLy4MK9fhTkAhIcoseqeSbjn3Fyg/a9DQIPWhIVPbkGjzuzvJhKRDPWv34TklgKDCSuqGiFAsIeHIAAAHh6YjCl+WPzWG1EhQXjj7DyMT1EDsLdbgIAfChrwxh8VAID3dlbiuyP17c8RBOCikYn462kD/dFkl/110VC8fuMYCIL95goAjlZqccnyrX5uGRHJkXLZsmXL/N0Icp/OasPfSmqgt4kQIUIAECwIeGRgEsZG+n9O2RUqhYDTB8Zhc3kLanXm9vexrawFrWYbXt1abo96x+TQzJwYPH/2ED+22HWjs6OhEICNB9puSAQU1+hhttowd1SiX9tGRPLCHnqAe7WyAfVmKwDR0UMX8ef0OIxSh/q7ab0SEqTAy2cMRlKECugw0vDuzkoAjmFrAUiNDMGzZw72Z1N77aELh+DCqWn2DxzTCs+sOox1e2r92zAikhUGegD7Q9uKHVqD4yMBIkSMjQzDnNj+OWd+IjGhQfj32XmIUCkcc+ptg/Bi+8evnpcHdUj3FfD93Qd3TsCE3BhAOH6z8ueXd6LVZPV304hIJhjoAcokivhPTbNjbta+8ipcocDtGZ6pj+4vA2JC8dT83PYeOYD2tQH3z87G4IT+vSagJ589MAUpMSH2OXVRRFlDK/768SF/N4uIZIKBHqA+b9Cg3myBgLaurIA/p8UhKijweq9dzcyKxmWjkjus1gemZkZj8dgU/zasjxKigvHWrePaV+lDBJ7/7CiOVur83TQikgEGegDSWG34ulEDQRDae+gTI8MwIzpwe69dPXhKFgbF299PVEgQnjy95wpygWL+6EScNT4Z9mkE+83YA//Z5+9mEZEMMNAD0LdNWpgcVcgECFArBdyYGuvvZnncs6fnIiRIgSdOHYDECJW/m+Mxz1w9wjGXbr8Z+3xrJbYebvR3s4gowDHQA4zBJuK7Zl37amkRIi5OjEa0DIbauxoQG4YVFw3H3IHyulkZkqbGbWcNQNtePAECXvjsiL+bRUQBjoEeYL5v0cFgs7Wvlo4KUmJeTGCuandFXgAvguvJfecPduyrtw+7r9xcgbK6Vj+3iogCGQM9gJhFEd802suf2nvoAs6Li0SwozIcBY6U2FBcMDWtfeEfRBGvry3s+UlERD1goAeQXXojtI7DPiAIUCsEnBbbf05Qo965/rRs+0gLAAgC3l9f4u8mEVEAY6AHkN90re01wSGKmBsTwd45AKvjv0Bz+tgkZCWGtVf4K6s34Oe9df5uFhEFKAZ6gDDYRGzVtjr2nQMQBEyLDKz55VW1OlywtxqpvxYjckMRTtlegU9r3NuDXWu24cGCBmRuKkHMhiLEbChC0i/FuGp/DWrMgRPvN5yWY69d7zgl75s/qvzdJCIKUAz0ALFDb+h0aleySomckMDZyvXwsQZce6AWPza0Qmu1v4fdWhOuO1iLs3ZXobIXJVD368yYsLUMr5S1oMlia/98q03E53V6zNleETChvnByimOxuz3Uf9xZ4+8mEVGAYqAHiJ2tBogi2nvoMwKod760oAEvlbZIfv2XJgNO21mJcuOJQ/hoqwULdlWisUOQd1VqtOLKfYERjCOyohAZFtS+L31XYTNqm43+bhYRBSAGeoAoMpo79dBHhwfGaWpbW4z4vzLpMG9TbLDg8v3VPT5GaxVx/p4qNPcQ5m1+bzHigyqty+30p6l5cfYiM47KcZsONvi7SUQUgBjoAcAiiqiyWDv10HNCA2O4/V+lzS4/dqfGhGdLpB+/vLgJxQaLy9d7u0Lj8mP9aWpeXPscugABmw5wYRwR9R4DPQA0WG2dKsNlhqgCZnX7jw29K5bybHGT0/nvFquIf/bi5gAA/tAY0eBCb97fpubFtc+hixCx+QB76ETUewz0ANBosbZXhhMgYGCALIarNlmhb9s376JWm4gPnQyVr6xxb/h8p6b/z0ePHRjdqbZ7fnlgjCwQUf/CQA8AWlvnHnqyKsjfTXJJrZsrzdfW67t9bk2te9vbCltdH6L3l6TokA5z6ECDxuznFhFRIGKgBwCjvWve3kNXKwLjr83au855u81OVnn/3Ghw61oaa/8fcgeAQalqxxw6AIho0Jj83CIiCjSBkQwnObMoAo4OnAgRamVg/LVFBrnfzm0dhsp7sxCuq3BFYKw1iIsM7nS+vc4QGPvoiaj/CIxkOMkZbWKnOfRACfSUYPePdO04VF7Ri6IzXSX2oQ2+FB6ibJ9DFyHCFACL+YiofwmMydiTnA1on0O3iWLArHAPVwgYEq7CYX3v54TLjMcDXd+HYfOR6mC3n+tLYcEKxxCMDQIEGL1U6U4UgQMlLfhlfx0OlmrQoDGhQWNCi96C8BAlosJViAoPQkJUCEbmRGHswBgMy4xEkDIwfub6G5PFhi2HGrDrWDOOVmpRWtsKrcECvcEKVZAAdVgQ0uLCkJsagXG5MZg6NM5eaIjIDfzJCQAqQbD30G32fcqGXq4c96d5sWFuBXrHfnW4myMS8SoFhoQFxo4ATau1fR+6CBFBHh6FOVKuxXOrj2DVpnLU93J+PiRIgQUTkrF4XhbOnZKKEFXf2rbtcCPeW1fcp2u0USkVUIcFIVatwsCUCAzPisKQdP+eQGg02/D57xVYsb4E63bVoNXk+g2pSilgxvB4XDEnE5fNzuxzuL/1XRF2HWty+rVHLxuG5NiQPl3/RGw24J639sDs5KY8KlyFJ68Z4dXXP9kw0AOAqq3oiKOH3moLnOHYi5Mi8Fr5iSvFdZUScvxHMyfUvR/TcxICpzxuVaMBgiDAJtoACAjuw/qDjqobjbj9tV1Ytakc7t4HGi02fLGlEl9sqURMhAoPXzoUS84f5HavPb9Mg1e+OuZeY1yQHBOCBePtNyDzxiTBV2tITRYb3lxbiCf/l4+KBvcWcZqtIn7eW4ef99bh/nf24dZzBuL+i/MQFe7+r2qp7/XQjEjcdm6u29d1xcZ9tXjx86NOv/an+dlefe2TUWBMxp7kVAI6zaEHUg99SlQIxkX2fth7eMTxnnVqsBLpIb2fC78xLarXz/GXgipdpzn0vvaCAWDjvjqMu30dPv3V/TDvqklnxn3v7MW429fh90P9swBOdZMR768vwWmP/IpRt/yAVZvKvf6a2w43Yvzt63Dbv3e7HeZdNenM+Mf/8jH4hu/w0YZSt65xySnpCJX4Wfrkl7K+NM8ln/4q/b2/+tQsr7/+yYaBHgDCFIpO+9DrrYG1AvrRnNhePT41WIlREZ1vAs6K711v+5KkCIyWmD9vsNiwQ2NCmQuHwfiCzmDttA9dgIBwN25gOvpoQynmPbQRlW5u9zuRfcUtmPPARp+EZV8cKNXg4ie34Jxlm1HpoaDt6uUvCzDtnp+wv8Q7BYFqmo24Yvk2XLF8K/S9/JmNjlBh4dRUp1/bdKAeFfXe+Z4A9uH21Zud/3xkJYZh9qhEr732yYpD7gEgWqmw70O32X/ZlxoDq/DIaXFhuDpFjfddPCzlurTIbp+7KT0Kb7pYmz0uSIHlg+K7fX5NrR4vlDRhl/b4HPJYdTBeykvAOD8unqtqsg+329dI2G/aoiPcn/v/eU8trn7uD/S0llAAkJMcjrEDY5AWH4qocBVUSgGNWjPqWozYWdCE/DIteurYGy02XLF8K77/+0zMHpXgdnt94ettVZh453p8tWw6xuXGeOy6d72xR3JIuauYCBWGpKsRHxmMYJUCzTozmnVmFFbr0aQ78b/pjzaUIb9Mi7VPzEBitOtz34vnZeOTX7oHq00EVm4qxx0LvTPs/sv+OlQ1Oq/UeNXcLATI2t6AwkAPANFKRfs+dJsooszUP6qffVOvx/+VtmCvzoQQhYCZMaG4JT0Kk6O6/7J5JS8B1SYrvjtBbfe0ECVuyYju9vm8cBUezI7B08XOF/i0CVcIWDk6GQkdhhnrzDZcf7AW6xu7v/YurQmztldg9ahknBYX1uO1vaWq0dBey90m2jA8y/2pgiatGZcv3wqLxBh7RnwY7jgvF1fMyUR6fM/vt1Frxoc/leDVr4/hYKnzmymTRcRVz27D3lfnI0bdtwWIUWFBmDvG9V6bxSpC02pBSY0eJbX6E04rVDQYMOv+DVj/1CxMGtK7USNnHnx33wnDfFhmJG5YkIOzJqZgaGb3G9U2BZU6bDpQjxXrS7B+d43ke9lR0IS5D27ExuWzEefiVNYZE5KRGBWM2pbuiyE/2VjmtUD/9FfpIf2rT+X8uTcw0ANAtELZaZV7uckMvc2GcD9VjDPYRPz5UC0+q+1conVVjQ6ranQ4Iz4Mrw9NRFyXhV0rRyXjL/l1Tmu1A0B6iBKfjU5BlMRiq4dzYlButGCFxPOzQ4Pw3vAkTOjwi67VJuK8PVXYo+15ZfdV+2uwe0pGn/bOu2tXYXP73y8gIDc1wu1rPfbBAcle0a3nDMQzfxqFiFDX3mOsWoXbzs3FzWcPxHOrjmDZhwdgMHfv9pfVt+KpT/LxzHUj3W43AAxIicBnj05z67maVgs27q3DxxtLsfLXcqftBACtwYozH9uE356fg8F9WA3/76+P4ZmVhyW/nhEfhmevH4VLZ2W41BPNTY1AbmoErj41CwWVOtz95h58saXS6WP3l2iw6Kkt+O7vp0DpQuGkIKWAy+dk4qUvCrp9bfPBepTXt57w5q63bDZg9aYKp1+bPCQWeRn+3YkgV5xDDwBKAUhXKTudh75b5725rxN5oqixW5h3tLa+FWftqkSdk1+qr+Ul4MUh8cjsMkf8p9RIbJ2UgaHhPffyXs1LwL+GxCO5Q/AmqBRYmhOD3yemdwpzALjxUO0JwxwA9DYRb1b0fjW+J6zdXt3pPPSpQ+Pcuk5NkxFvri10+rWHFuXh5ZvHuhzmHSkVAh64ZAjWPnEKIiTm9l/5qgAaP9bNjwwLwtmTU7Di3kk4+vYCXDU3U/Kx9RoTFj29BUaJ0D+RrfmNWPLGbsmvnzM5BXtenY/LZrsW5l3lpkbg88em4ZMHp9jrEzixbnctnl99xOVrLp7nfAGaCGBlDwvX3PXrgTrJ9RtcDOc9DPQAMTIstNN56Hv0/jlFrMUq4nUXTgPbrzNj/s4KlDtZxHN9aiQOTM3Ej+NS8c2YFBybnoWXhsRL9sy7ui41EkenZWLduFR8OzYFhdOz8FB2DNRdnv9BlbbHG4+uvujFYz1p7Y7qTuehzxrh3nz0RxtKnfZMJwyKwd8X932/7+xRCfjkoSlOv6YzWr0SDO5Ijw/Dinsn4cP7JiE4yPnP1K5jzXj8gwO9vrbRbMPi57fBZHE+Jn7t/Gx89ug0xPZx+gEALpmZjp+enoUoib3oj39wAOX1rh1PPHFwLIZJDPl7Y7X7p07m7AH7PvvLZknfbFHfMNADxKiwkE499J1+6qFvajLYS9G6oKDVghsP1Up+fUpUCGbGhCLRzS1ak6NCcEp0qOTXlxU29up6h/TmHheBecN3O6vt/+OYQw9RKTBjePcFfa74eluV088/eEmex/ZinzUpBVfMdv4L+ds/nL++v1wxJxOfPTodQRLD0i+sOYJDEmsDpPz940M4XO58yuecySl4687xLg2Du2pKXhw+uG8SnF3RYLbhqU/yXb6WVC/9t4MNKKtz7cbAFTYbJHc/nDUpBfFRgVG9MRAx0APEmLCQTj30FqvNL6vdj7T27jU3Nhmwxg893/eqtKh2owa8r0v2rN1RY7+JcJyHvmBCstvX2uJkX7hKKeCMPlzTmXsvGuz087/ur/fo63jCmROT8dS1zuf2zVYRj3/oei+9ssGA51c7nzfPTgrHinsmeTTM25w7JRW3nuN84dr760pcPsjnyjmZTm8MREj3qN2xqafh9nlcDOdNDPQAMikitL2HDlHELy2+D8omN2qM/6Oodz1lT/hftWtb5Pztq21V9nKvjjn0S2dmuHWd2mYjWpzMYafEhkLt4drg43JjMDit+8K9ykZDvzz29a4LBmHcwO47JwD7/PHRCp1L13nqk3zJMq5v3jG+z6v8e/Lo5UOhdrL+QdNqcXlkJCspXHJ7oSeH3aWKycSpVThnSorHXoe6Y6AHkFmR4e09dAgCfmzSujz87SlhbtQYz9ebsbHJd1MEWquIX9x8PV/+g/j1YD2KavQQYR9uD1UpcL5EEZATqXeyJQmAy1ubemvMAOd7uUtqPTd06ylKhYDXbx/vtHdqE4F3fig64TU0rRa8K/G4cyan4LRxSX1q44kkxYRgsUTv9oedNS5fR2q72Jb8BpTU9L2DIIrSw+2Xzsr0WEljco7f3QAyLjz0+MIxUYRBBNY3+7Yn6u5892e1rvWCPOGg3r1eYlqI0ukvfW958tPDAOzFZCCKuGxWBkLd3DYndV8nFfR9NW9MImaPTOj2n62fliWeNCQWM0c6751+sL7khM//6OdSaCWGtpcuGtqntrnqohlpTj+//ajrI2AXn5LudOW8iJ7LtLpq04F6ydK3XN3ufdyHHmDmRkXgswZN+77lrxq0ODNWumCFp01wUjTGFTt9OBR71I3T3QD4tLDMrsJm/Li7Bm212yEIuPv8QW5fT2pVdVl9K45W6DDIyRB5X9x89kDcfPZAj17T266dn42N++q6fb60rhV7i1owKke6oM9KiV7nmAHRmDbMvW2GvTVndCJ+empmt88H9+ImOzIsCOdNTcPHG7sPsX/ySxnuudD5+ghXSRWTGZwW4fZ2THIde+gB5oxoNYIVx09fqzdb8EOj73rpoyKCO+0Bd1Vve82lRivWNbbi3+UteLKoCS+UNmOvzrVrtFjcW9p2cZLvil0s+/ggHF1zCBBw6uhEjOhDhbikmBDJPeJPfXLI7evKySWnpEvWyP+xh2FrbasFG/Y6361xucSKf29QKgTMGZ3Y7b/pw3q3K0JqtfvWw40o7sOwe0/D7VLTBeRZDPQAE6lUYEG0utPpax/WNKPZ4ruDRq53Umv9RHRW8YSnxP3UaMCSI/UYsLkEw38vxfl7qnH/0QY8VdyEx481YvofFRi1pQxPFTehqYfQjnRjni43LAhzYqS3wHnSrsJmfLu9Bo7l7QBE3NvHnpFSIeAUif3r7/xQjBfWuF6ERK7UYUEYN9D53P8fR6SHrX8/1CC577wvuxL8ZcGEZCTHOB9p68tq900H6lHu5LAXAdI3EeRZDPQAdHaMGiGCYD/QAyIMNhs+qO65xrkn3ZgehQg3zsIOldjS80uTAaO2lGHhniq8XaFxWmGuTZHBgieLmjBySxk+q3PemxgX2ftpgccH9L22t6ueWuWYO3cUk5k9MgGnje37oqor5kj3Fu95ay/mPrgRa81iW0cAACAASURBVLdXw9pP57l9Yfwg54G+u1D6349U2EeHB2HMAOer5/szpUKQHFnoy2p3qeH2mSMTkJPcu9MSyT0M9AAUqVTgkvgoiI7KYgCwsVmPfB9Vj4sPUuCh7N6dWOWspGuz1YZrD9birN1VKDL0rmxos8WGxftrcP/R7nuvh4WrkBPq+vKQ61IjcUGiZ+eYpazfW4vPtlS27zuHIODZP/WtBnqby2dnIidJ+hfnz3vrcOZjm5B4+Ve46B+/4/nVRxy9T1/vvvcfqUA/ViW9aHN/ifOSwKNyogP2xDCpHvO2I40oqu79sHtPw+1Xs3fuMwz0AHVWrBrZocGOfen2nt6/yurR4qOh9zszozE31vUh6lO6DGc3WGw4fWclVtX0bfX7v8tbcOrO7nXj78h0rec0Py4M/xriXmW23qrXmLD4X9vtFf/s8yW49JR0yWHg3lIFCXjvnok4UW2TRq0ZqzdX4N6392LaPT8j+uIvcMq9G3D/O3vx+e+VqG32T1lhXxic5nydRKvJhkat88WUUvPKQ/pwuIu/jR8UgxFZnisFaz/kpftwe6hKgYtPSe/19cg9DPQAdn1yjKOHbu/p1ZkteLpYutSqp60YkYRRLp4jfmuHI1FrzTacsasSB1w4A9oVW1uMOGNXJWo7hPqf0yIx8wRz4mfHh+ODEd7dP9zR1S9tR73G7LgFExAZGoTnrhvl0deYNTIBr98+/oSh3pHBbMOmg/V4dtURnP/Eb0i64msMvuE7XPvCH3jj20LsK26BKJNR+qgeDv+pk7iRqXASVACQ5uETynxNaqGaO4H+qcRzzpuahugI7xXcoc64bS2ADQ4NxgXxkVhdp0HbaukjeiNeKa3HrZne73VGKxX4cVwqbjhYiy8l5rMB4I2hCRjUoVrZlfurcdBDYd4mX2/GmbsqsXZsavtZ6B+PTMafDtTg+y5nsKcEK3FHZjRuz3B/VXlvvfljMX7aW+c4gMVek//Za0ciRWJxUl/csCAHcepg3PTyDtS5uQ/9aKUORyt1eG+dfY92TIQKM0fE48yJKThrUgqyexja78+iw6V/5bVKlArWSkwHxbl4M+tMSY0e6/d47uY7PT6s18VtrpybiaXv7etWw2D70SYcq9JhYIpr01D24XbnR6Vy77lvMdAD3KLEaOzRGXBEb2qvOPZzoxYDwoJxVoL396eHKwT8d0QSvqjT4+niJuztcFRpgkqB14YmYkGH/d3PFDfhNy8N6baF+s8T0hChEBClFLBqVDL268xocJSsDVIImObmXnp3HanU4YEV+9sXtYs2YMaweFw333tbeS6ckYZZoxLw2IoDeG9dMfROTr3rjSadGV9urcKXW6sgADh7cgruv2iIZLGW/qqn3qLUcaqtEt+7UImjTV2xo6AJf/rndref39WC8cm9DvSMhDDMHZ2Idbu731h8srEMDy7Kc+k6vx2qR5mTU9+SY0Jw+vjA2wUQyDjkLgN3pSdArVQ4aoIDEAS8U96Abc2+q/W+MCEcmyekoXB6Fr4Zk4I/JqWjcHpWpzDf2mLE34u8uxr/kN6MpV0Wyo2IUGFmTChmxoT6PMy1BgsWPv378d6faC/u8Z87xnv9tROigvHqrWNR+t6ZeOmmMVgwPhmhblb660gE8NXWKsx6YCOufeEPtOj9dw56b/U0daCS2O4YJLGjwxsHsfia1OK43lSNk9rqdsWcTMnvHXkHA10G4lVKPJKdCJUA+6pbx2+tpwtrsEfj22NWE1QKzIwJRZ6TucrrDvpmfv+dSk23YXZ/MJhtuOi5bSiubT1eUlYQ8PZt45CV6Lsh67jIYNy+MBdrn5iBxk8WYuMzs/DkNSNw1sTkPp/b/d66Ekxash6VEuU++5vmHqoISt3sREjsmJDD7oCLZjgvtrOjoAkFlSdesNrj6naJuvHkPQx0mRgQGox7shLbt0IB9oVXTxZU44DW/79sl5c0o7iXW9P64qZDtWix+ncl1yUvbMOvB+sd59jbXX9qFs6b7N4BLJ4QGqzAzJEJeGhRHr7+6wzUf3wu9rwyH6/eMhZXzsl0a278cLkWpy79Bc0eXhfhDT2NJkgNx0tVl5Oacw8k6rAgnD/VeY14VxbH/X6oAaVOzlIfmR2FsRIn3JH3MNBlZJw6FEsyE9t76CJEmEURTxypRr7Wf1uRigwWPFHo2yNU68w23HW4e91uX1n88g78tK+ubUchBAiYOCgGz0mcze0vggCMyonCzWcPxAf3TULRu2eg7P0z8d/7J+H603N63Nfe0cFSDe55a6+XW9t3UjcdCsFePteZSInjZ/uyvS80WInkmJBe/5cU7fkpI6mFa64EulQxGS6G8w8uipOZGTHhsIoJeKmkDgIE2EQRRohYdrgSf89LRW6Eb+eQAeDZYt9VsevokxodLk1W43QfHroCADe+sRtrtlbaP3AMmAxJi8BXS6cizM3T1HwpPT4Ml8/ObK8mtutYMz7eUIp3fyhGTQ8h9vb3RbjxjAGYnOe7qnu9dbTS+bkHyTGhknPi2cnh+ONo95/h6kb3A/2MCcmo+vDsXj+vvL4VGVd/6/brOjN/XBJSYkNQ1eX97DrWjCPlWgyW2G8vivbz5LtSCMCVcxjo/sAeugzNio3AXzLiHaveYT9q1SZi2eEqFLt5tKi7Wqwi3q/y7RGvHd10qBYNPpzrvP/DA/hoU3mHOXMgNzkCPzw2A9E97IHuz8YOjMbTfxqJonfPwPM3jJIcggaAf31+1Ict671dBc5vLodmSu8IyU1xHmhSNwfepJM4wrUvlApBsmxwT730LfnOh9vnj01CWrxvzkWgzhjoMjU/Xo1r0uLaV70DgNZqw6OHKlFh8N1c5/uVGp+9ljN1ZhseP+ab4f4nVh/Gaz8UtZX6AQBkxIXi+8emIyHK/T3L/UVYiBJ3XzAYW/85F3ESi+lWbSqHwdR/F4vtPNbs9PM9HZ0qdfTsoVLf/2w3SVSz66ur3SgyIz3czsVw/sJAl7GFSVG4LDWmbRIXogi0WKxYeqAC1UbfLFD7j58Dva0N1V5ewPR/3xXiua8KANjXLggAUmJC8N2j071SPMafRmRH4c07Jjj9mtFiw7bD3evr9wcGkw07JXroPZ3VPS7XeWneBq0Zh8t920v31qjAmIHRGJXd/aZmT1EL8sucv6az4XZ1qBIXTHe+yI68j4Euc4tSY3BeSox9Lhf2nmOj2YqH9pejzsuhXm60Ir+HbUK+9HaF924s3ttYikf+d/zMcUEQEBuhwncPT0OOD7anLfvwIOYv/aXbf1K1yT3hwhlpGJTqvOe6p8h5L9jfvtxSCU2r85/5OaMSJZ83LjdGssKc1Dnp3uLNUYHFvVgctyW/ASW13YfbpbbBkW8w0E8C16TH4rTEyLZjXAAAdSYLHtxfjgYv9ly/rfddYZsTebPC+YlZfbVmWyXufH/f8f3/AhARosQ3S6ch18XSmX11rEqHdbtru/1X4aR6lyedKnHka72b5Wa9bcX6YqefH58bg9Q46TlfpUKQrIi3erPzkqfest5JVTdPuXJOltMzAJzVaZcaiudwu38x0E8St2QnYG6C+nilLBGoMVrw4N4yNJu9E+rrGv1f3KVNndmGjU2e3Y//9a4aXPfGrk4V+sJUSnxx/xSM7GGRladJLbbzdrEXqeI4/bFyXFG1Hmu3Vzv92mWzM074/IVTnNcOWLerRvLwFk+razFhS773pjPS4kOd3qTtLW7pNjLgbLg9MyGsx5EO8j4G+knkzgGJmBnvWLEr2EOo0mDGg3vKofPCSvAN/SjQAXi0etyGg/VY/OoOAMLx3QQAVt8zCZMk5ly9JTPR+ba8nzx4+IczqiDn27z645Dr3W/ugdlJoaHgIAFXzT3xFqvLZ2dCHdr9fZmtos9W9r/2zTFYup6k4mFSpWA79silhtuvmpcFBRPFr/jtP8ncOygJU2Mj7Kd+OSqYlbaasHRvGVqtngv1JosNGj9XauvqiIfm8/8obMblr+zoVJFPFIFPl0zEjDzpxVXeMl7iBuKLLZVefd0yJ1uWAPQ4fO0PP+yswZrfnA+NXzEny6X2qsOC2vfld/V/Xx6VPDPdUxo0JrzkgxuHC6enI8LJDVnHQJeq3X61xM0A+Q4D/ST00JBkjI0Jb69gBgBHtSY8vKccRg/1AGKCFIjqZwcz1HtgamF3SQsu+tcfMFpsnSryvfuXsTh9tH+GGycMjnU697mvuAVrvDjH+7PECMAwH043nEhVowHXSZxqplIKWOriiWIAcP/FeQh2MirRarLhhn/tgM2Lu/XufH03an2wNiEiVIkLZ6R3+/z+Eg0OlNiH3Vc6qd0+cVBMj3v5yTcY6CepR/JSMDI6DGLbjmlRRL7GiEd3l8HkoVCfFevbCm0nkiVxyIarDlfpcMGL26AzWjvs7xfx+vVjcKEf67PHqlWSx1Te+/Zer8xpb9xXhz1F3RcahqoUmOKHUQpn6lpMOPOxTU6P9gSAOxYOkqyC5sygtAjcek6u06/9uKsG97y1x612nsjzq4/gg59KvXJtZ3oadt+a3+h0NIKL4foHBvpJKlghYNmwVAyNdAw3CgJEUcS+ZgOW7XH96MSePJTt/lzyvNgw3JcVjQ9HJKHylGxoZudg1+QMfDE6BbdkRCHFjRKqC+Ld30JWUt+Khf/chhaDtVMFvuWXD8el0/y/7/a603Kcfv5YlQ5nP76pz+ehd9SgMeHq5/9w+rVzJqcirB/Moe842oSpd/2EXRKFZIakq/HXq4b3+rqPXj4MaRJD9C9+fhRLXt8NqwfnuZevPIz73vZtjfxTxyQ5fY+f/lLmtJiMSingcolKc+RbDPSTWIhCwN9HpGGQOqTDnLqInU2teHT3iQ9mOJHR6mC8OdS1YeiYIAUWp6jx0cgk1MzMxuejk/HYgFgsTAiH2jF0nxsWhLmxoXgmNw5HpmXi27EpuCEtEpEuDO2fnxiOS5Pc20ZW3mjAwhe3oV5nBiA65sxFPHTeYPxZosKWr100Ix2Thzivof7rgXrMvn9D+5BpXxwo0WDq3T9JzhkvOX9Qn1+jLwoqdbjllV2YfNd6FFQ5P/4zVKXAh/dNQoSTRW4nEqtW4b/3T4ZS4jfnv74owOkP/4pCidd2VV2LCZc9vRUPvLsPvl6JolDAaSnYA6UavP5tYbfPnzkxRRaVEOVAEEWxf61cIp/TWWx4YE8ZjmmMgAiIoghRBKYlRODx0d3n03preUkz3ipvQWWXPe+j1cGYER2KcxPCMTPG/YVUB3RmrKnVYWWNFke7FA6JDlLg3qxoLMl07yjHeq0JC57bipL6Vog2+/dFFEXcMDsLz1w2zO02e8OewmZMWrIeJovzf9IhQQrcvjAXfzlrIHIlisJIOValw3OrjuDt7wslr3/pzAx8/ODkE17rg/UlWOykh5+bEoHXbhvXq3a1mqyoazHhYGkLNuytw7bDjT0GoEIAPnloCi5yMk/cG8tXHsYD7+6T/HpYsAJ/OWsg7jxvUK+OpG3QmPDKV8fw4mdH0OCkMNDonCgkxYTix101nT6/YHwy1j4xw/U3cAJ7i1ow+tYfXXrsyqV9/36SZzDQCQCgsVhx364yFGuNAASINhsgCpiXHIn7R3pmflhrFVFrtiJSqUCCyjuDQ5UmK8qNFuisItJClBgc5v6BKC0GC856YSuOVOlhc3w/RNGGRZPT8Oq1ozzYas/538YyXP7M1h5DTQAwc2QCpg+Lw5S8OGQlhiNGrUJ0uApGsw1agwX1LSbkl2twoKQF322vdjpf3lFuSgT++Nc8xEjUeO9IKtC9TaUU8O5dE3HlXM8MDz/83n48+Ul+j48RAEwbFodTxyRhwuBYDEyJQHxkMEKDFWg1WdGss+BYlQ77ipqxbnctNuytdbq9DgAy4sPw2wtzsGZzBe54fXenr3k60AFg7G3rsLuw56p/sWoVKj84GyFe+vdMvcPjUwkAEBmkxDNjMrBkRymq9Ca07a9eV9WCYIWAJcNT+vwaaqUAtdK7P3KpwUqkeuCIUp3Riotf2YEj1XqIomOYHSIumJDab8McAC6dlYEmnRm3vLITUlO5IuyL2jbu88x58TlJ4fjxyZkuhbm/pMaG4sP7J2GuB3ci/OOaEQhSCnjio0OSN1AigM0HG7D5YN8KwuSlq/Hd309BRkIY5o7xzW6KxfOysPsE8/eLZmYwzPsR/k1Qu2iVEsvHZiAxVIWOc8XflDfj5YPOq2zJkdFiw6J/78CeUk2ntQXzRybizetH+7t5J3TTmQOwculUp4VQPG3B+GRsfXEucpK9X7PeHUoFcO38bOx9db5Hw7zNX68ajs8enYZYL97MnDM5BZuem9M+dD8iKwqJPpizvnJupuRagTZXS9R/J/9goFMniSFBWD4uA3EhKsdqbvsxbZ+XNOLtwzUnvoAMXPfuHuwoboH9RBt70Zjpg+Lw0c29m9/1pwump2HXy/Mxc0S8V64/IDkcq5ZOxdonZiAxuv+dJhcVFoQ/L8jB3ldPw7t3TUC8FwNw4dRU7H55Pq6am+m0HoC7UmJD8NYd4/Hl49M7tV8QgDk+qHmQEhuK+WOdb4cEgEGpEZg+zDs/X+QeDrlTNymhKjw7LgN3by9Fo8Fs/w0i2vDxsQaEKhS4cpDzgyrk4Lp39+CnQ/Wd9uePyYrCx7cETpi3yU2NwMbls/HF75V4ZmV+n4d9FQIwa2QCFs/LwpVzs/rFUGtwkICI0CAkRYdgUJoaowdEY86oBMwckeDT7XOZiWFYce8k3HfREDy76jA+/136ZLcTGZqhxo1nDMRfzhog+R7mjk7Ep07qqXva4nlZ+G6H89E5qf3q5D9cFEeSSnQm3L2tBC0mS/vqbojAbcOScX5O/yge4kk3f7APn++qgWgT21f7D0tV4/M7JiIqLPDvfY9V6fD11ir8fqgBO481oaRGD10P+9PDghUYmR2N8YNiMD43BmdOTJGsG0+dtRqt+OaPKvy8pw67C5uwp7AZzRIFfhKjgjEqJxpzxyTijAnJmDjY+fZDohNhoFOPjmmNuGdbCbQmKyDCvtobAu4emYKzs+Tzi+f+lYfw4ZYKe5gDsNlEDEwIxzd3TUKMxGlmctCgMaFJZ4bBZIPRbEVYsBLRESpEhavc2qdN0lr0FrTozWjWmWGxilCHBSEhKhjREfL9+SLfYqDTCR1pMeCebSXQm+2h3hZ6D45Jx2kZ7u3v7k/+/vVRvLah1LH/XoRoA9JiQvDNkklIjup/88NERM74fxKM+r3BUaF4ZkImQhSK9hrmogg8tbMcP5X3vE+1v3v5p2K8/ktphzlzIDk6BGtuncAwJ6KAwkAnlwyLCcMTEzLaa5gD9q1cf9tehl8rey460l/9d1sFnvnumOPUObvYCBXW3DIeWfGcKyaiwMJAJ5eNj4/APyZmHj8H3NFTf2RrKbbXaP3cut5ZvbMaD645DMAe5iKAiBAlPr15PAYk9s891UREPWGgU69MSVTjb+099bZsF/HQ7yXYXde3Ayl85buDdbhr5cH2j0UA4cFKfPznsRie6vpxmkRE/QkDnXptRnIkHhmXAQCOmWcBRqsN920uxv4G56dw9Re/FjTipg/3o+NSUEEAVlw3BuOzA3+BHxGdvBjo5Ja5aVF4cFxa+9wzBMBgseHuX4qQ39jqz6ZJ2lnagus/sB9H2TbCAAF479rRmDrQ/bPbA8W6xlZM2laOp4ubJB+ztsH+mOUl/l3suN7R1u0ak09f9/L9NfhLvmdq3BP5GgOd3HZ6RgzuGZNm/8Ax/K63WLFkYyEKmg3+bVwXeyu0WPz+XhgtNrSv6xOAVy4fgXlDT47ylVOjQ1FisODdSo3kYSL/rdLikN6M6b0s53rB3mrM3lHR90Y66KwiSgwWGKROmPGSCqMF1SbpYjtE/RkDnfrknOxY3Dwi+ficOgCt2Yrbfz6Gohajv5sHADhap8dV7+2Bzmiv1GWvUQ+8eMkwLByd5OfW+U6EQsDCxHBUGK343cnfTatNxHf1emSFBmFGdO/OpzdYRegljv10x7kJ4aiemY0ZPq4Tv2F8GtaMkq5fTtSfKZctW7bM342gwDYyLhwCgJ11uvZQN1hsWF/ajDmZ0Yj0wHGm7iptMmDRO7vRqG+rSQ8IEPDXcwbj8kmeOec9kKiVCnxcrYNaqcBpcZ235n1T34r/1ejwl/QozI45Hug2AF/W6fFOpQZf1+tRabJiuDoYQYIAEcCqGh2+b2iFxmpDanAQooOUiAqy9xU0VhEfVGvxQZUW6xoNsAIY1OGMepMIrKnVIVSpgM4q4sXSZhhEIEyhwPcNrUgMDkKEUkC50YrvG1qRGarCXp0J/1fWgnWNrdDaRAztUsnPLAIra3X4X7UOX9XpUWCwYECYCuHK4yen/NDQijqzDXEqJV4v12BbixGTo0LwQ0MryoxW5IQeL/Wbrzfj3UotVtbo8FuLEYCAATIoBUzyw0px5DGv7q3Cx4dr2+u+izYgKUyF1+YPQrIfyqdWthhxyTu7UdFsaK9wJ4rAnXOzcde8HJ+3pz+wARj6WykAIH9aJjoeDnbtwVqsqtFh1+QM5DoCS2sVcfHeKmxqNiI1WAmlAJQZrRijDsY3Y1MRoRSQ9ksxWh1D42EKAW8NS8S5CeE4pDdj4e4qVJmsGBAWhCazDQ0WG65JVePlIfYDfurMNgzYXIK7s6LxfqUGdWYbHsmJwZDwYFx9oAbfjEnBzJhQrKnV4+oDNbg9IwqvlrcgOzQIjWYbGi02XJsaif8bEt/e3lN3VuCw3oxp0aEQAGxrMSJYIeD7sakY7iizOmlbOfLCVag22UcrZseE4qsxKZi0rRwJKiW+HZsCAFhRpcWt+XXICg3C4HAVSgwWHNabcXWKGq/kyfeQIgpMHHInj7llVAouzHXMRzvm1Kv1Jty67ijqWs0+bUuD3owr3t+LymaD41x3AIKAa6aknbRhDtj/wS9KVqPS1HnY3WATsbZej8lRIe1hDgCPFzZgU7MR7wxLxOFpmTg4NRMrRyVjn86Ep4oaoQQcQ+Oh9oCcmY1zE8IhArj2QA0soohNE9Owe3IGCmdk4f7saLxXqcU39Z13Q7xU2oxLktTYPSUDS7Kkdxu8V6nBj+NSsXtyBo5Oz8K82DD8p1KDMschM+9XaXBAZ8aP49LwzZgUfD0mBdsnZ8BoE/FGRecCSF/X6xGsEPDrhDR8PLL7MLsIYGlBA86MD8eeKRlYMyoZ2yel489pkXi/Ssu5dup3GOjkUUvGpuHcAXGOc9Ttw9sVWhNu+bEATQb3jpPsLY3Rgive34vSxlZ7mVrHnPkFY5Lw13MG+6QN/dkVyfa99qtrjtcN+L6hFTqriMuTj+/DN4oiVlRqcXFSBC5Jimj//IK4MFyYGIH/VmklF9dtajZgv86MRwbEYlSE/SxvBYCHc2KRFqLEh1WdCxFNjgrB8kFxGBgahBBB+lDxWzKiMTHSPq8eLKC9vUcdN4wDw1R4KjcOEyKPnx+eGaJEpFJAWZefv1CFgA9HJGGMOhhqZffX1NtE3JwehaU5MZ1+UQ53vJ/yHk6qI/IHTgSRx90/IR1Gqw3fFTUCoj1MSzUG3PzjUbx+2mBEefGcar3Jiqs/3I+jdTq01YATIEAtADdPzfDa6waS4REqjFIH47NaHZYPioMA+zx2sABc1CG4D+jMaLWJMNlEvF7euXers4posNhQarQgK6T7r5Edju1mRa2Wbs+NVCqwS9t5O9o0FxfhjesQ1AAQ7ziTvdWxIO+MuDC0RIdibUMrDuvNKDFYsFNjRK3Z5uT7EIyYIOk+TYRCwNKcGBzQmfF+lRYlBguKDWZ8U9e/ay3QyYuBTl7x6ORM6M1WbCxtsZ+jDgGFzQbc8sMRvHb6YKi9sFDOaLHh2o/2Y1+lxj7M7ug/6ltMKCnUYsTt63D7Obl47NI8RMv4SFRXXJGsxkMFDfit2YjxkcFYW6/HWQnhiO0QcM0Wewj+1mzAQV33KZPBYSrJle3NFnvvdXWtDsFOetxxXYLU2WOciVT2PKi4vrEVVx+ohcZiQ16ECoPCVDgtLgwFTqZ8TvSaFhG4cn8NvqnXI16lwPCIYOSGqXBOQgT+Wx1YpY7p5MBAJ695akYO7t1QiM0VLWjrKR9pbMVtPxzFawsGI7SH3pE7/rLyIHaVt0AQBNhE+yS+ocWEumNaQLDXnn/5mwJ89GsZHr44D7eeOcCjrx9IFiVH4OGCBqyu1aHebIW2y3A7AEQ5wvOWjGjc28O8tjNtz317WCKm+PDUulvz65AarMS2SelI7XDT+HaFptfX+qjaPte/fFAc/pIe1b6A8N1KDQOd+iXOoZNXPTd7ACalqCG0DX8LAg7W67HkxwKYrN2HQd1125pD2FzU5Dja1T7MPyg+DGmiwvG69scJgoAGrQn3vb8Po+5aj693VHusDYEkSaXEqXFh+LxWh9W1OiSoFDg9rvOhNCPUKqiVAtY7qfx3S34dxm0tg9Qs8lTHEHrX55pFYPIf5bjpkOersWmsIsqMVpwaF9YpzAsNFlS5sYDtgM4+LXBlSmSn3QC/NfeP+gpEXTHQyeuenTUQYxIdc7OiPdR3VGtw97pjHrn+3V8exg+H6ztdPy8xHJ9eNwZbn52DFXdPRHp8WKdQFwEcq9Fj0QvbcO7TW3C48uTrcV2erEaVyYpVNTpcnKRGUJcR6BBBwJ2Z0filyYC7jtRjt9aEfL0Zjx1rxIoqLa5KiURbbEYoBZQaLfixsRX1FhumRIVgVkwoXihpxitlLTjcasZ2jQmX76u2b/tKjfT4+4lUCkgNVuKrOj3268yoM9vwVb0e5++pQqhCQJ3Zijonc+lS8hzTMq+UNaPBYsPhVjPuPdqAz2rtiwmLDGYYueuX+hEGOnldsFLAP+cOxIiE8OM9aAjYWtGCJT8c7dO1H/u+AN8crHOMAAAQBGTHhuLDxaMRGRIEQQAum5mBTrAWeQAAGStJREFUg6/Mx6OX5iHCUTBE6HAE7M8H6jBl6S+4Z8V+1Gt9Wzvcn85JCEek0n5zc0WK81Pm7s+Owb1Z0XivUoNTtldg4rZyvFregnuzonFPh2H4K1LUMNpEXLCnGhsb7WV/PxiRhFNjw/BgQQMmbC3HnB0V2Kk14Z1hiV6rAPfa0ARoLDZM/aMcAzaX4Lb8OtyXFYOb0qOwXWPCDQdrXb7WVSmROC8hHE8WNSF7UwkmbC1HUasZ349LRZRSwDUHarHbx7XmiXrCwjLkM60WG27+/ggO1ush2kRAFGCz2TAnOwbPnZrb6+u9+GspXncUSbE5rpesVmHVtWOQqA52+pyqRgMe/fgQ/vtrmT3UBRGCQgFBAASFgOjwIDywcDBuPDUbKidbmU5WLVYR+7QmBCuAIeHBiJLY5qWx2JAUrOw0RF1hsqJAb0acSonB4SoEe/nbqrOJOKQzQyEAIyOCoXK8XonRgrggpdMtaj0pMlhQYbQXx2kbytdaRTRYrMgMCQJ/Sqi/YKCTT2nNVlz/zWEUNRns1eQcFdxOGxCLp+YNdPk67/5RgWc3FLc/HyKQEKHCx1eNQkbMibdA7Sxsxn0r9mPL0UZAABQKARCE9mDPTY7A3y7Jw1ljTp5a70QU2Bjo5HONBgtu+PYwSpuNEG02AAJsNhFnD4rD3+aceOX5yr01eOyHgvZyrgAQGazEp1ePQXZs7w4VWbO1Eo99ko/ier0j1B3hDnuwzxgSh+WXD8PQVOdD0kRE/QUDnfyirtWMG74+jHKNsb2HLYoiFg1PwgMzsiSft/ZwPe75+kj740URCAtS4KMrRyIvMULyeT0xWmx49fsiPP91AXQmq72XLgiAwv6nUingqunpeOicQUiIdD6UT0Tkbwx08ptqnQnXf5WPKp25vadts4q4ekwK7nJS1W19QSPu+DIfEGHfZy4CIUoB/1k0AmPS+r5qulZjwt/XHMaHm8shwt5DB9Dec48KV2HJ6Tm4cXYWgj28h56IqK8Y6ORXFRoTrvvqEOr05vbT0ERRxM0T03HjhLT2x/1e2ow/rz7U3itv66G/f+kITMyI8mib9pVpsPSTQ9h8tLG9ty4o2ubXgcz4MDx8ziAsHJMMFwucERF5HQOd/K6kxYjrvjiExlaLvUysaF+1fte0TFwzNgV7qrS4bvVBGC224z15m4jXLhiGWQNivNaub/fU4PHVh1HcYC+OcjzUFYAgYlRGFJ6+MA/jsjx7Q0FE5A4GOvULhU0GXPv5QWiM1vZQF20irh6bik/2VkNvskK02Y+0FG0injtrMM7Mi/d6u8xWEW9vLMHz3xVCY7B0CPXjfy4YkYhHz85FdlyY19tDRCSFgU79xsE6PW744hD05uM98bYFc7YOHz+1YBDOHZbg07Y16Mx4du0xrPitDCI6rIZ3hHqQUsDiKelYMi8bsSf5wS9E5B8MdOpX9tbocOOXh2Aw2+w98vY5c/ufD83OxhVjUvzWvmO1eiz74gjW5zc4wrzzHHtUWBBumZWFP01NRwgXzhGRDzHQqd/ZUanBzV/mw2gVO/XQb56Sjlum9I8zzX8/1oRHvjiC/GotFI459bY/BYUC6dEhuG9+Ds4dmcRKYkTkEwx06pe2lLXgpi8OOVa9A5ePSsZDs7P93axORBFYs6say384hiqNqX1OHe0r44HhKWosOyMX4z28Ep+IqCsGOvVbvxY345av8nFuXgL+Md/1srC+ZrTY8PbmMrz2ayk0Jmu3inMKhYC5g+Pw4Lwc5HDhHBF5CQOd+rWChlbkBkgINurN+OfPxfh4RxVswPGKc45wD1IKWDQ2GXfMyEJMWJC/m0t+YLLYoDNYYTBZYbWJCFEpEKJSIiqcPw/Udwx0Ig8rrG/F0+sK8dPRRgAiBKUCQNscOxAZGoQbJqfhmgmpCFFy4ZzctRqteGHNEfznx2IcrdRJPu6sicn461XDMXFwrA9bR3LCQCfyku1lLfjb98dwqFZnn1Nv379un19PjgzGbdMycd6wRCi4ck52LFYR7/5QhGUfHkRFg8Gl5wgALpmZjicWj8CQdB4IRL3DQCfyIhHA1wdq8cIvJajSmNr3rXdcQDcoPhxLpmdido73qt6R7/20pxbnLtsMndHa6+eeNzUV/3twCkJUHMEh1zHQiXzAbBXx/o5KvLG1HFqT1WnFuXGpatw9PQujktw7NY76j33FLZh+z8/QtFrcvsYF09KwculUKJjp5CIGOpEPNRks+PfvZfjf3mrYIHTbvy4IwKkDY3HbpHRkR/fubHfqHwoqdZh1/wanw+yLZqVj5sh4DM+OREpsKPYXt2BXQTM+/KkMxdX6bo+/c2EuXrxpjC+aTTLAQCfyg9JmA176rQw/FDRA7FJGVhDsK+LPz0vATePSEMcV8QHlxc+O4q4393T6XHp8KFY/OgUjcqLsBQwEodufT3x4CM98eqTT81JjQ1Hw9gKEhSh9+RYoQDHQifwov06P5ZtKsL1Sc3zfuvL4n6FBClw5MhmLRyQjnPOpASHrmm9RWtfa6XObX5iFcbkxEEURgiBI/nn9P3fgvz+XdXruW3eMx/ULcnz4DihQ8TcEkR/lJYTj7fOG4rVz8v6/vXuPjrI88Dj+e2eSTEgmtwkkIYRLEEGWWgUVlVaxICp4WUW3q+1Rce26+wd1667d07PdXfFs157t6VrXevb07LrVtna7B8UrIlRaVFAuFlqVe7hUIPeZZCY3MsnM++wfM5kkJiooyUwevp9/XicR80yQfHney/NoVmle4oe7lDp2x41++n6Dlr+4V6sPNCvm8vfvTFbf0j0k5nctnqKLZpTIcRx5PZ5PPH7v7jnyOIMfeXh2S+1ovgWMYQQdyACXVRXqf2/9E/3rompVFfhkZOTIkZSYuYWjMT22s063r92v14+FRdYz03DXzf/mT89JRNtJ/I4Oe0x+vqo0VzMqB98UuWFX46iMHWMfQQcyhCPpunMCWnPbHH378ikqzvUmVpqTSVxqlVTf1aNVW4/pL16v0R+aP36REqRHxzB3tV84vVhex5EnORMf9jjg81Xjh66MyIVRnAqCDmSYLI+jP589QS/e+gXd+8UKjctO3BDVF3XHkWrCJ3X/W0f1t5uP6kD45Cf/BzFqIp29g16nlv+V5CTPuXza69zsoTfAEXScCm6fBTJUXrZH9104UV89b4Ke/KBBLx9pUd8SJX0z953NnbrvjcP6yqQifWN2uar8Oekc8lmvKD970GtjpIPHw8mLJzqlY1N46Gn7j1xWB4ZF0IEMV5ybpQcvqdIds8v0k/fr9UZtW6IUyRVHHMfRG3Vt2tLYrqVTirViVplKffzRTgf/MI8YvrqjTjMr85NPqJnUqZaPe10bGnzGJTfbQ9BxSvhTD4wRk/w5+pcFU1UTPqnH36vXe8FOyZOMgUdyjbTueFgb69t0y7SAvja9VP5hTt9i5FQGhi4G9MymE7pzYYVOZY7eFOlVYzg66NcvPH/CCI8atuA5dGCM2tncoSf3NmpfuHvQ2vB9i9QU5GTpz6oDWj6lRLns6jZqpq54TceaB8+yF80p0KzK3MHPnctJPM2QfG2MtGZHWMH2wTfW8Rw6ThVBB8a4bY3teupAs2rauoddI77El6WvTy/V0soiZXHudsQ9vfFD3fOjnUM+fl6FV5OKh/+LVU9c2l0bU2vX4B/Hk8ePU82T17JJC04JQQcsYCRtaWjX0webdKyrV337sDuSnOTKc5X5ObqzulRXlRWIrI+sSx/YpB0HW4d8PMfjyud15TgmdbI95nrUHffINUN/V9Y+tEDXz68Y+QHDCgQdsIiRtKm+Tb84HFRtV8+wM/Zqv093V4/XnMJc5XEqfkT8sbFLc7/5G4U/8hjb6WBjFpwugg5Yan1tRM8cCSrYGx/2GnthTpZurizSTRVFXGMfAdv2t+iW721VQ2v00//lj1hx9VQ99cBFIzAq2IygAxaLGaMNdRH934ctCg0I+8AZe2G2V7dMLNb15YXyeTgZfyY1tHbrLx/fpbU7Gk7p3y/2Z+vRb3xR9yyZOsIjg40IOnAW6HWN1tVHtPp4iyIxd9BMvW8/9uKcLN1SUaSlEwqVQ9jPqC17QnrspRqtebtu2M97vI5y8rL1pS+UauM/Xj7Ko4MtCDpwFom6RmvrwlpTF1ZH3E2sOOdRYoev5LEox6vl5UW6YUJhuodrnVjcqLM7pmivK9cYrX+/WQ/8co9kkovMuNKv7r9ISy8sS/dQMQYRdOAs1B139UJdRC81hNVtJDkmOVPvm7kbBXKydUtZoa4O+JXN424jZvEjW7XraEQykusanVuerx2PXDFkG1Xg0xB04CzWGXP1UkNEa5siOumaYe+KD2R7tbysSIuK83mOfQRsO9Sqpf+2XcY1iagbox+vOF93L5yc7qFhjCHoANQRc/VyY0Rrm9sUNab/2rqMHG9iF7DxvmzdVFqgRcX5zNjPsNt/vFMb3muW67qScTTen609jy5SLgvK4DQQdAApHTFXLzVFtC7YrqhJ7MMux5HjSWwC4zhScZZXN5YWaEmJXzmE/YyoaejUpf+0WfG4Sc3UH7ljtlZeV53uoWEMIegAhmiLxfVyc5teC7arR5Jk+mfsHkfGSIXZXl0f8OvakgKN4674z23l0x/oF28dl4wjN+6qojhXex79inKymKXj1BB0AB+rPebqxeaINoQ6BszY+/ZjT8j3erQ04NeyQIHyWaDmM2uIRDXn7zapN+bKGMm4Rv9xz/m6d9GUdA8NYwRBB/CpIrG4Xmpu04ZQu/oWM03tGpY8jvN4dG3Ar5smFMpP2D+TlU99oJ+/eTxx2l3S5ECu3v/3RcrycgYEn46gAzhlbbG4Xmlu14aWdp10P/KjI/mjJMdxtKS0QDeXFao4i/3YT8fx0Emd/+Amxd3EDN0Yo5+vnKdbL6tM99AwBhB0AKetM+5qXbBdrza3qTMZHknJqDtyjVGO42hxqV/Ly4tUmpOV1vGOJX/13+/rl5uPJxabcY0unxnQxocWpHtYGAMIOoDPLOoarQ+26+WmiMK98dTHTd/KZ5K8Rroi4NfyiUWaPC4nXUMdM/bXdeiS77yZnKEnvpc7f7BQs6sK0j00ZDiCDuBz63WNNoY69HxDWKGeeCrmJjlj77smPK9wnJZPKtb5hePSONrMt+yRbXprX0huPPF9u+vKKv3kry9M86iQ6Qg6gDMmbozeCHXoufqI6k8mH3gz6l+rPHmcke/TrVUl+tJ4v7jda6hXftegOx77Xepu99xsr2qfvFbjcrgnAR+PoAM444ykLaEOra5t1bGuXrmukaPEsqaOEmuWyzgq92VpeVWJrpnIDm8DxV2jGSs3qjEcTa7x7urplfN0+xVV6R4aMph31apVq9I9CAB2cSRNzcvRsvIizcj3KdgTU2N3b3KGrtSxo9fVjlCH1tVG1B13Ve33yccjb/I4jpoiUW0/2CojI8c46u5xCTo+ETN0AKOipiOq1cdatDXUKTfuSnISM3UpdY09W9LiiUW6bVpAk/PP7hvo9td2aN63N6V2YfM6jpp+tkz5Pk67Y3gEHcCoauju1bPHWvV6fUQ9fWuXS6m7umUSx7mBPN1aXapLy87e6+xzH3xD+0+0p66lr/n7+brhkop0DwsZinNbAEZVRW62vjmzTM8smK47pgZUkO1NRb3vOXZjjHYFO/UP2z/Unb89pOePhNQdd9M67nRYOrcs8Q/Jedf63zemcTTIdMzQAaRVNO7qtdqInj0aUuPJXhlXqVl6313xxpXGeR1dP7VEt80Yr4q87HQPe1Rs3hfSNQ+/kzh74RpNCozTkf+6Jt3DQoYi6AAygmukLY1tev5oi94PdaWuHUv919hd18gjRwsq/PrquRM0tyw/nUMecb1xV6V3rVO0J3F2wo0bHfufazWxJDfNI0MmIugAMs6RtqhWHw7qNyci6oklYta/cppJLYtaXZirm84JaNn0gPzZdt4sduV3N2tHTWvyUT9p3T9frqsvKEv3sJCBuIYOIONML/TpO3Mn6blrZ+ne2eUKJBdUScS8f+W5w+GT+tHOOi17drcefvtDvdfUmc5hj4iLZ5QkdrVL3luw51h7uoeEDMWOCQAyVlGOV3edN0Ffmzlem05E9GxNUHuCXZKUuNaeXFa2xxitO9yiVw+1qLrQp1tmjdcNM0rlt2BltXMq8tR3o6Dk6FhTV7qHhAxF0AFkvCyPoyVTirVkSrH2hLq0+kCzNh0bcDq+7wY61+hIuFs/3Hpcj2+v1eJpxbp19gRdWOFP7xv4HEoLfIN2s2s7GUvvgJCxCDqAMWVOaZ4eXjBV35oX0yuHQ3rhQFB17T39G8IkrzVHY3G9WhPS2gNBVRX6dNPM8bp+VqkqC3xpfgenpyQ/O3W6XZLau3rTPCJkKoIOYEwqyc3SXXPKdeeccr1b164XDga16Y+tismRa9z+DWHk6Fi4W09sP6Entp3QhRP9unHWeF13bqn8Y2DVtUhX74Dd66RxPn5sY3j8nwFgTHMkza8s0PzKAoW7J+vFA0Gt2desE5HogKj3n5bfVduuncfb9NDrR3TduaVadl6pFs8IpPU9fJL6lm5J/e+jtODseAYfp4+gA7BGcW6WVlxQoRUXVOjdunY9t6dJvz3SqmjvgP3ZTWrhNb12IKh1+4MqyPHoqukBLZkZ0JerSzQuO3MeANq0O5hcQM+RXFezJhWke0jIUDyHDsBqbdGY1te0aO3+oH5f255Yec70X2t3BzzXbozk8zr6cnWJrplVqkUzAyrKTd+852Bdh+Y+sEm9vW5inK70wROLNXsyUcdQBB3AWaOuLapX9gX1/O4mHQ93969AF+9fia4v7n2vF0wr1tWzSrV0zgSVF4zuDnDXrHpbb+4OJXenkypLcvXhT68b1TFg7CDoAM5Kuxs69PLeZr26N6hgR09qFbrUWvKuZJQ8Jl/PLs/XFTNKdOWMEl1aXaycrJE5Nd8Tc3Xff/5Bv3rrRPJrJ84e/OxbF+nrV00eka+JsY+gAzirxY3RrhPtev1ASL/eH9SJcLT/dPzAteRN/wzedY1yszyaP61IV84MaOHMgGZPPDPPuje3RXXz97dr56HwoK83f2aJ3vnBwjPyNWAngg4AA+xt6NCv94e0cX9Ie+o7UjEfeO194DX4vo/nZXt0XoVf55bnaWa5X7Mr/Tq3PF9VgU/eSOVQQ6eONHZqy74WbT3Qos17g4Ou6fcdt/3wKl08o3iUvgsYiwg6AHyM463d2rA3qPV7m/Xu0UjqBroh19rj/TP5QTfcJT/v93nl92UpL8ejAl+WvI6jo01damjtHvLrE7/OlYwj1zXy53r11P3zdPNllWn4DmAsIegAcAo6ojFtOxLWO4fD2nq4VR+caJfrDrjGnrpbXoOue/ddfzcfuZt+0O5x7tC77Y1rdN6kAr303ctUXZ6X7rePMYCgA8Bn0BGNa/uRVm2padW7R8I6UN+pSGePjByZ1AzbTe4O5w778cRx8F31MtKNF1fonkVTtezi8jS/S4wlBB0AzpCmtqgONXbpQH2HDjZ06lBDp06ETqopElWovWfAbL5vJm7k92WpvNCnyeNzddtlk7T88okqymM1OJw+gg4Ao6Q+3K2mSI+ivXGVFfk0bQKn0nHmEHQAACyQOQsWAwCAz4ygAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABYg6AAAWICgAwBgAYIOAIAFCDoAABb4f9ceZ9OQQk1fAAAAAElFTkSuQmCC'; // URL con la imagen 

        // Agregar imagen como logo al inicio de la página
        var imgWidth = 30; // Ancho de la imagen en el PDF
        var imgHeight = 30; // Alto de la imagen en el PDF
        var imgX = 20; // Posición X de la imagen en el PDF
        var imgY = 10; // Posición Y de la imagen en el PDF
        doc.addImage(base64Img, 'JPEG', imgX, imgY, imgWidth, imgHeight);

        // Crear el título
        doc.setFontSize(18);
        doc.text("Reporte de Mascota", imgX + imgWidth + 20, imgY + 40); // Ajustar posición del título respecto al logo

        // Crear la tabla con estilo personalizado
        doc.autoTable({
            startY: imgY + imgHeight + 20, // Ajustar posición inicial de la tabla debajo del logo y título
            head: [
                ['Atributos', 'Datos mascota']
            ],
            headStyles: {
                fillColor: [37, 150, 190],
                lineColor: [0, 0, 0], // Color negro para las líneas del encabezado
                lineWidth: 0.1, // Grosor de las líneas del encabezado
            },
            body: [
                ['ID Mascota', mascota_id],
                ['Tipo', mascota_tipo],
                ['Raza', mascota_raza],
                ['Edad', mascota_edad],
                ['Sexo', mascota_sexo],
                ['Color', mascota_color],
                ['Peso', mascota_peso],
                ['Altura', mascota_altura],
                ['Fecha de Nacimiento', mascota_fecha_nacimiento]
                ['ID Cliente', cliente_id],
                ['Rut', cliente_rut],
                ['Nombre', cliente_nombre],
                ['Apellido Paterno', cliente_apellido_paterno],
                ['Apellido Materno', cliente_apellido_materno],
                ['Direccion', cliente_direccion],
                ['Telefono', cliente_telefono],
                ['Correo Electronico', cliente_email],
            ],
            theme: "grid",
            styles: {
                textColor: [0, 0, 0], // Color negro para el texto resto de la tabla
                lineColor: [0, 0, 0], // Color negro para las líneas de la tabla
            },
            columnStyles: {
                0: { // Estilo para la primera columna (lado izquierdo)
                    halign: 'left', // Centrar el texto
                    fillColor: [100, 149, 237]
                }
            }
        });




        // Guardar el PDF
        doc.save(nombreArchivo);
    };
</script>

<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>