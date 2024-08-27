<?php
require '../vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("./db.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['telefono'])) {
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
        $email = mysqli_real_escape_string($conex, $_POST['email']);
        $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha_hora = date("Y-m-d H:i:s");

        $query = "INSERT INTO clientes (nombre, email, telefono, fecha_hora) VALUES ('$nombre', '$email', '$telefono', '$fecha_hora')";

        if (mysqli_query($conex, $query)) {
            // Preparar el correo con PHPMailer
            $mail = new PHPMailer(true); // Instancia PHPMailer

            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();                                           
                $mail->Host       = 'smtp.office365.com'; // Cambia esto por tu servidor SMTP
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = 'Ezek_po_13@hotmail.com'; // Tu dirección de correo
                $mail->Password   = 'Emma-1991'; // Tu contraseña de correo
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                $mail->Port       = 587; // Puerto TCP para TLS

                $mail->SMTPDebug = 2; // 0 = off, 1 = errors and messages, 2 = messages only, 3 = verbose messages
                // Remitente y destinatario
                $mail->setFrom('Ezek_po_13@hotmail.com', 'Quilmes NET');
                $mail->addAddress($email, $nombre); 
                $mail->addBCC('ezequielgutierrez90@gmail.com'); 

                // Contenido del correo
                $mail->isHTML(true);                                
                $mail->Subject = 'Confirmacion de recepcion de tu solicitud';
                $mail->Body    = "Hola $nombre,<br><br>Gracias por ponerte en contacto con nosotros. Hemos recibido tu solicitud para adquirir nuestro servicio y queremos informarte que te contactaremos a la brevedad posible para brindarte toda la información que necesitas.<br><br>Apreciamos tu interés y paciencia mientras procesamos tu solicitud. Si tienes alguna pregunta adicional o necesitas asistencia inmediata, no dudes en responder a este correo.<br><br>¡Que tengas un excelente día!<br><br>Saludos cordiales,<br>El equipo de Quilmes NET";
                
                // Enviar el correo
                $mail->send();
                echo 'Correo enviado';
            } catch (Exception $e) {
                echo "Error al enviar el correo: {$mail->ErrorInfo}";
            }
        } else {
            echo 'Error al guardar los datos: ' . mysqli_error($conex);
        }
    } else {
        echo 'Error: Los datos del formulario no están disponibles.';
    }
    mysqli_close($conex);
} else {
    echo 'Método no permitido';
}
?>
