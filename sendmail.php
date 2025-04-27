<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                    // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';               // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                           // Enable SMTP authentication
    $mail->Username   = '1jpopenl.np@gmail.com';          // Your Gmail address
    $mail->Password   = 'hxvk hbzp outo corg';            // Gmail App Password
    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption
    $mail->Port       = 587;                            // TCP port to connect to

    // Recipients
    $mail->setFrom('1jpopenl.np@gmail.com', 'Your Name');
    $mail->addAddress('jaykishorchauhan2018@gmail.com', 'Receiver Name');    // Add a recipient

    // Content
    $mail->isHTML(true);                                // Set email format to HTML
    $mail->Subject = 'Test Mail from PHP';
    $mail->Body    = 'Hello! <b>This is a test email</b> sent using <i>PHPMailer</i>.';

    $mail->send();
    echo 'Message has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
