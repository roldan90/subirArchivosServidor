
<?php include "header.php"; ?>

<?php
    session_start();
    $operacion = "";
    if (isset($_SESSION['operacion'])) {
        $operacion = $_SESSION['operacion'];
        unset($_SESSION['operacion']);
    }
?>


    <div class="container">
        <h1>Subir archivos a sevidor con php</h1>
        <div class="row">
            <div class="col-sm-12">
                <form action="servidor/subirArchivo.php" enctype="multipart/form-data" method="POST">
                    <label>Subir un archivo a servidor</label>
                    <input type="file" name="miArchivo" class="form-control" required>
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" class="form-control" required></textarea>
                    <br>
                    <button class="btn btn-primary">
                        Subir archivo
                    </button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?php include "tablaArchivos.php";  ?>
            </div>
        </div>
    </div>


<?php include "footer.php"; ?>

<script>
    let operacion = "<?php echo $operacion; ?>";

    if (operacion == "insert") {
        Swal.fire(":D", "Agregado con exito!", "success");
    } else if(operacion == "error") {
        Swal.fire(":(", "Error al agregar!", "error");
    } else if (operacion == "delete") {
        Swal.fire(":D", "Eliminado con exito!", "info");
    } else if (operacion == "error2") {
        Swal.fire(":(", "Error al eliminar!", "error");
    }

</script>