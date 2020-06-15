<?php

$nombre= $_POST['name'];
$email= $_POST['email'];
$asunto= $_POST['subject'];
$mensaje= $_POST['message'];

$body = "Nombre: ". $nombre ."<br>Correo: ". $email . "<br>Asunto: ". $asunto . "<br>Mensaje: " . $mensaje;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);




try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                     // Enable verbose debug output
    $mail->isSMTP();                                              // Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'notarialalvarez@gmail.com';                     // SMTP username
    $mail->Password   = 'marinafages';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('notarialalvarez@gmail.com',$nombre);
    $mail->addAddress('notarialalvarez@gmail.com',$nombre);     
    
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $body;
    $mail->AltBody = 'Hay un correo desde el sitio web';

    $mail->send();
    echo '<script>
    alert("Consulta enviada")
    </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error:";
}
