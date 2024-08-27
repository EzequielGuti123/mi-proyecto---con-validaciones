<?php
// Incluir el autoloader de Composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP(); // Habilitar SMTP
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
    $mail->SMTPAuth = true; // Habilitar autenticación SMTP
    $mail->Username = 'tu_correo@gmail.com'; // Tu dirección de correo
    $mail->Password = 'tu_contraseña'; // Tu contraseña
    $mail->SMTPSecure = 'tls'; // Habilitar encriptación TLS
    $mail->Port = 587; // Puerto SMTP

    // Configuración del remitente y destinatario
    $mail->setFrom('tu_correo@gmail.com', 'Nombre de la Empresa');
    $mail->addAddress('destinatario@example.com'); // Dirección del destinatario
    $mail->addBCC('ezequiel1@gmail.com'); // CCO (copia oculta)

    // Contenido del correo
    $mail->isHTML(false); // Establecer formato de correo en texto plano
    $mail->Subject = 'Confirmación de recepción de tu solicitud';
    $mail->Body    = "Hola nombre_del_cliente,\n\nGracias por ponerte en contacto con nosotros. Hemos recibido tu solicitud para adquirir nuestro servicio y queremos informarte que te contactaremos a la brevedad posible para brindarte toda la información que necesitas.\n\nApreciamos tu interés y paciencia mientras procesamos tu solicitud. Si tienes alguna pregunta adicional o necesitas asistencia inmediata, no dudes en responder a este correo.\n\n¡Que tengas un excelente día!\n\nSaludos cordiales,\nEl equipo de Nombre de la Empresa";

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado correctamente.';
} catch (Exception $e) {
    echo 'No se pudo enviar el correo. Error: ', $mail->ErrorInfo;
}
?>
