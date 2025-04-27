<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure to include PHPMailer's autoloader

// Generate a random OTP
$otp = mt_rand(100000, 999999); // Generates a 6-digit OTP

// Store OTP (you might want to save it in your database for verification)
session_start();
$_SESSION['otp'] = $otp;

$mail = new PHPMailer(true); // Create a new PHPMailer instance

try {
    // Server settings
    $mail->isSMTP();                                 
    $mail->Host = 'smtp.gmail.com';                  
    $mail->SMTPAuth = true;                          
    $mail->Username = 'your-email@gmail.com';        
    $mail->Password = 'your-app-password';  // Use your app password if 2FA is enabled
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('your-email@gmail.com', 'Your Name');  
    $mail->addAddress('recipient-email@example.com');  // User's email address

    // Content
    $mail->isHTML(true);                            
    $mail->Subject = 'Your OTP for Password Reset';
    $mail->Body    = "Your OTP is: <b>$otp</b>";

    // Send the email
    $mail->send();
    echo 'OTP sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
