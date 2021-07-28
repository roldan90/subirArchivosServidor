
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
        <th>Imagen</th>
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
            <td style="text-align:center">
                <?php 
                    $ext = $mostrar['extension'];
                    $imagen = '';
                    if ($ext == "pptx" || $ext == "PPTX") {
                        $imagen = '<img src="https://image.flaticon.com/icons/png/128/888/888874.png" width="50px" height="50px">';
                    } else if ($ext == "xlsx" || $ext == "XLSX") {
                        $imagen = '<img src="https://cdn.icon-icons.com/icons2/1156/PNG/512/1486565571-microsoft-office-excel_81549.png" width="50px" height="50px">';
                    }

                    echo $imagen;
                ?>
            </td>
            <td><?php echo $mostrar['descripcion']; ?></td>
            <td>
                <?php

                    if ($ext == 'jpg') {
                        $cadenaImagen = '<img src=' . 'archivos/' . $mostrar['nombre'] . ' width="50px" height="50px">';
                        echo '<a href="visualizarFull.php?nombre=' . $mostrar['nombre'] . '" target="_blank"> ' . $cadenaImagen . ' </a>';
                    } 
                ?>
            </td>
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