<?php
include '../../views/db.php'; // Ajusta la ruta si es necesario

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoge los datos del formulario
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $dni = trim($_POST['dni'] ?? '');
    $celular = trim($_POST['celular'] ?? '');

    // Validación básica
    if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($dni) && !empty($celular)) {
        // Preparar la consulta para insertar en la tabla alta_clientes
        $query = "INSERT INTO alta_clientes (Nombre, Apellido, Email, DNI, Celular) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conex->prepare($query); // Cambié $conn a $conex
        $stmt->bind_param('sssss', $nombre, $apellido, $email, $dni, $celular);

        if ($stmt->execute()) {
            echo "Cliente registrado con éxito";
        } else {
            echo "Error al registrar el cliente: " . $stmt->error;
        }

        $stmt->close();
        $conex->close();
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>
