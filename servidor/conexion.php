<?php

function conexion() {
    $servidor = "localhost";
    $usuario = "root";
    $password = "autodidacta";
    $db = "sistemasweb";

    $conexion = mysqli_connect($servidor, $usuario, $password, $db);

    return $conexion;
}