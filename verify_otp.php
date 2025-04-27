<?php
session_start();

// Get the entered OTP from the POST request
$data = json_decode(file_get_contents("php://input"));
$enteredOtp = $data->otp;

// Check if the OTP exists in the session
if (isset($_SESSION['otp']) && $_SESSION['otp'] == $enteredOtp) {
    echo json_encode(['success' => true, 'message' => 'OTP verified successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid OTP.']);
}
?>
