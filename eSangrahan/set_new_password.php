<?php
header('Content-Type: application/json');
session_start();

if (!isset($_SESSION['otp_email'])) {
    echo json_encode(["success" => false, "message" => "Session expired or unauthorized access."]);
    exit();
}

// Get data
$data = json_decode(file_get_contents("php://input"), true);
$newPassword = $data['newPassword'] ?? '';
$confirmPassword = $data['confirmPassword'] ?? '';

if ($newPassword !== $confirmPassword) {
    echo json_encode(["success" => false, "message" => "Passwords do not match."]);
    exit();
}

// Check password strength
if (strlen($newPassword) < 6) {
    echo json_encode(["success" => false, "message" => "Password must be at least 6 characters."]);
    exit();
}

// Hash password
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
$email = $_SESSION['otp_email'];

// DB Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esangrahandb"; // This should match your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

$stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $hashedPassword, $email);

if ($stmt->execute()) {
    // Clear session
    unset($_SESSION['otp']);
    unset($_SESSION['otp_email']);
    echo json_encode(["success" => true, "message" => "Password updated successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to update password."]);
}

$stmt->close();
$conn->close();
?>
