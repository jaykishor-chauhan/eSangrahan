<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Get email from the POST request
$data = json_decode(file_get_contents("php://input"));
$email = $data->email;

// Check if email is provided
if (empty($email)) {
    echo json_encode(['success' => false, 'message' => 'Email is required.']);
    exit;
}

// Generate a random OTP
$otp = mt_rand(100000, 999999); // Generates a 6-digit OTP

// Store OTP in session (you might want to save it in your database for verification)
session_start();
$_SESSION['otp'] = $otp;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                  // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';              // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                          // Enable SMTP authentication
    $mail->Username   = '1jpopenl.np@gmail.com';       // Your Gmail address
    $mail->Password   = 'hxvk hbzp outo corg';         // Gmail App Password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption
    $mail->Port       = 587;                           // TCP port to connect to

    // Recipients
    $mail->setFrom('1jpopenl.np@gmail.com', 'Your Name');
    $mail->addAddress($email);                         // Use the email provided by the user

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Your OTP for Password Reset';
    $mail->Body    = "Your OTP is: <b>$otp</b>";

    // Send the email
    if ($mail->send()) {
        echo json_encode(['success' => true, 'message' => 'OTP sent successfully!', 'otp' => $otp]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send OTP.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => "Mailer Error: {$mail->ErrorInfo}"]);
}
?>
