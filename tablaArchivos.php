
<?php 
    include "servidor/conexion.php";
    $conexion = conexion();
    $sql = "SELECT * FROM t_archivos";
    $respuesta =  mysqli_query($conexion, $sql);
?>

<table class="table table-bordered table-hover">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Tipo archivo</th>
        <th>Descripcion</th>
        <th>Descargar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php 
            while($mostrar = mysqli_fetch_array($respuesta)) { 
        ?>
        <tr>
            <td><?php echo $idArchivo = $mostrar['id_archivo']; ?></td>
            <td><?php echo $mostrar['nombre']; ?></td>
            <td><?php echo $mostrar['extension']; ?></td>
            <td><?php echo $mostrar['descripcion']; ?></td>
            <td>
                <a class="btn btn-success" download='<?php echo $mostrar['nombre'] ?>' 
                    href='<?php echo "archivos/" . $mostrar['nombre'] ?>'>
                    Descargar
                </a>
            </td>
            <td>
                <form action="servidor/eliminarArchivo.php" method="POST">
                    <input type="text" hidden name="idArchivo" value="<?php echo $idArchivo; ?>">
                    <button  class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>