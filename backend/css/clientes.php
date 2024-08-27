<?php

include $_SERVER['DOCUMENT_ROOT'].'/mi proyecto - con validaciones/views/db.php';

// Ruta absoluta para el archivo db.php
$db_path = 'C:/xampp/htdocs/mi proyecto - con validaciones/views/db.php';


$sql = "SELECT id, nombre, email, telefono, fecha_hora FROM clientes";
$result = mysqli_query($conex, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-striped table-bordered'>";
    echo "<thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th></tr></thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>" . $row['fecha_hora'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No hay datos disponibles.</p>";
}

// Cerrar la conexión
mysqli_close($conex);
?>
