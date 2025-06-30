<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ferrarigiuseppe372@gmail.com';      
        $mail->Password = 'khcx kweb mugc mytf';              
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        
        $mail->setFrom($email, $name);
        $mail->addAddress('ferrarigiuseppe372@gmail.com');     

       
        $mail->Subject = "Messaggio da $name";
        $mail->Body    = "Hai ricevuto un nuovo messaggio da:\n\nNome: $name\nEmail: $email\n\nMessaggio:\n$message";

       
        $mail->send();

       
        echo "success";
    } catch (Exception $e) {
        
        echo "error: {$mail->ErrorInfo}";
    }
}
?>

