<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");
include("../../app/controllers/mascotas_controllers/mascotas.php");   ?>
<br>
<div class="container-fluid">
    <h1>Lista de Mascotas</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Mascotas Registrados</b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>tipo</th>
                                <th>Raza</th>
                                <th>Edad</th>
                                <th>Cliente_id</th>
                                <th>Registrado</th>
                                <th>Actualizado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach ($items as $item) {
                                $contador++; 
                                $id = $item['id'];
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $item['id']; ?></td>
                                    <td><?php echo $item['nombre']; ?></td>
                                    <td><?php echo $item['tipo']; ?></td>
                                    <td><?php echo $item['raza']; ?></td> 
                                    <td><?php echo $item['edad']; ?></td>
                                    <td><?php echo $item['cliente_id']; ?></td>
                                    <td><?php echo $item['fyh_creacion']; ?></td>
                                    <td><?php echo $item['fyh_actualizacion']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="update_suministro.php?id=<?php echo $id; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                                            <a href="delete_mascota.php?id=<?php echo $id; ?>" type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar</a>
                                        </div>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>


<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>
<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 productos",
                "infoFiltered": "(Filtrado de _MAX_ total productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": [
                {
                    extend: "collection",
                    text: "Reportes",
                    buttons: [
                        { extend: "copy", text: "Copiar" },
                        { extend: "pdf", text: "PDF" },
                        { extend: "csv", text: "CSV" },
                        { extend: "excel", text: "Excel" },
                        { extend: "print", text: "Imprimir" }
                    ]
                },
                {
                    extend: "colvis",
                    text: "Visor de columnas"
                }
            ]
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });
</script>
