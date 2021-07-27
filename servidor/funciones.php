
<?php

    include "conexion.php";

    function agregarReferenciaArchivo($nombreArchivo, $extension, $descripcion) {
        $conexion = conexion();
        $sql = "INSERT INTO t_archivos (nombre, 
                                        extension, 
                                        descripcion) 
                VALUES ('$nombreArchivo', 
                        '$extension', 
                        '$descripcion')";
        $respuesta = mysqli_query($conexion, $sql);

        return $respuesta;
    }