<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json'); // Asegurar respuesta JSON
header('Access-Control-Allow-Origin: *'); // Permitir solicitudes desde cualquier origen

// Habilitar reporte de errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $mensaje = isset($_POST["mensaje"]) ? trim($_POST["mensaje"]) : '';

    if (empty($nombre) || empty($email) || empty($mensaje)) {
        echo json_encode(["status" => "error", "message" => "Todos los campos son obligatorios"]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Correo electrónico no válido"]);
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'huitzillizbeth4@gmail.com';  
        $mail->Password = 'ewikputkvseeflth';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurar remitente y destinatario
        $mail->setFrom('huitzillizbeth4@gmail.com', 'VisionFest Contacto');
        $mail->addReplyTo($email, $nombre);
        $mail->addAddress('huitzillizbeth4@gmail.com'); // Reemplaza con el correo de destino

        // Contenido del correo
        $mail->Subject = "Consulta de " . $nombre;
        $mail->Body = "Nombre: $nombre\nCorreo: $email\nMensaje: $mensaje";

        // Enviar correo
        if ($mail->send()) {
            echo json_encode(["status" => "success", "message" => "Correo enviado correctamente"]);
        } else {
            echo json_encode(["status" => "error", "message" => "No se pudo enviar el correo"]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Error al enviar correo: " . $mail->ErrorInfo]);
    }
}
?>