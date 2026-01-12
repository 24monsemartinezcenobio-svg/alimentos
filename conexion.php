<?php
$conexion = new mysqli("localhost", "root", "", "alimentos_db");

if ($conexion->connect_error) {
    die("Error: " . $conexion->connect_error);
}
?>


