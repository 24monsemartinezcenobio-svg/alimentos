<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$fecha_caducidad = $_POST['fecha_caducidad'];
$cantidad = $_POST['cantidad'];

$fecha_actual = date("Y-m-d");

$sql_verificar = "SELECT id, cantidad FROM alimentos WHERE nombre = '$nombre'";
$result_verificar = mysqli_query($conexion, $sql_verificar);

if (mysqli_num_rows($result_verificar) > 0) {
   
    $row = mysqli_fetch_assoc($result_verificar);
    $id_alimento = $row['id'];
    $cantidad_existente = $row['cantidad'];
    $nueva_cantidad = $cantidad_existente + $cantidad;

    
    $sql_actualizar = "UPDATE alimentos SET cantidad = $nueva_cantidad WHERE id = $id_alimento";
    if (mysqli_query($conexion, $sql_actualizar)) {
        echo "'$nombre' actualizada.";
    } else {
        echo "Error al actualizar la cantidad de alimento '$nombre': " . mysqli_error($conexion);
    }
} else {
    
    if ($fecha_caducidad <= $fecha_actual) {
        $sql_insertar = "INSERT INTO alimentos (nombre, fecha_caducidad, cantidad)
                VALUES ('$nombre', '$fecha_caducidad', '$cantidad')";

        if (mysqli_query($conexion, $sql_insertar)) {
            echo "Alimento guardado correctamente.";
        } else {
            echo "Error al guardar el alimento: " . mysqli_error($conexion);
        }
    } else {
        echo "Error: La fecha de caducidad ya ha pasado. El alimento no se guardará.";
    }
}

mysqli_close($conexion);
?>