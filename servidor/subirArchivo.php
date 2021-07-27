<?php
    session_start();
    include "funciones.php";

    $descripcion = $_POST['descripcion'];
    $nombreArchivo = $_FILES['miArchivo']['name'];
    $extension = explode(".", $nombreArchivo);
    $extension = $extension[1];
    $rutaTemporal = $_FILES['miArchivo']['tmp_name'];
    $rutaDeServidor = "../archivos/";

    //subir un archivo
    //move_uploaded_file nos retorna un 1 si se subio y un 0 si no se subio

    if (move_uploaded_file($rutaTemporal, $rutaDeServidor . $nombreArchivo)) {
        $insertarEnBD = agregarReferenciaArchivo($nombreArchivo, $extension, $descripcion);
        if ($insertarEnBD) {
            $_SESSION['operacion'] = "insert";
        } else {
            $_SESSION['operacion'] = "error";
        }
    } else {
        $_SESSION['operacion'] = "error";
    }

    header("location:../index.php");