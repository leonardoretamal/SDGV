<!-- mensaje global -->
<?php
if ((isset($_SESSION['mensaje'])) && (isset($_SESSION['icono']))) {
    $respuesta = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
?>
    <script>
        Swal.fire({
            position: "center",
            icon: '<?php echo $icono ?>',
            title: '<?php echo $respuesta; ?>',
            showConfirmButton: false,
            timer: 3000
        });
    </script>

<?php
    unset($_SESSION['mensaje']);
}
?>
<!-- isset pregunta si existe esta variable -->