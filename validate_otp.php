<?php
header('Content-Type: application/json');
session_start();

// Get OTP from request
$data = json_decode(file_get_contents("php://input"), true);
$enteredOtp = $data['otp'] ?? '';

if ($_SESSION['otp'] && $_SESSION['otp'] == $enteredOtp) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid OTP"]);
}
?>
