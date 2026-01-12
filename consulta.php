<?php
include 'conexion.php';

$sql = "SELECT nombre, fecha_caducidad, cantidad FROM alimentos";

$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Alimentos</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Fecha de Caducidad</th><th>Cantidad</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["nombre"]."</td><td>".$row["fecha_caducidad"]."</td><td>".$row["cantidad"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay alimentos registrados.";
}

mysqli_close($conexion);
?>