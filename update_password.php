<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esangrahandb"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the POST data
$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$newPassword = $data['newPassword'];

// Check if email and newPassword are provided
if (empty($email) || empty($newPassword)) {
    echo json_encode(['success' => false, 'message' => 'Email and new password are required.']);
    exit;
}

// Start session and retrieve stored email
session_start();
$storedEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Check if the email matches the session email
if ($email != $storedEmail) {
    echo json_encode(['success' => false, 'message' => 'Email not matched']);
    exit;
}

// Hash the new password before updating it
$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

// Update password in the database
$query = "UPDATE newusers SET password = ? WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $hashedPassword, $email);
$stmt->execute();

// Check if password was updated successfully
if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Password updated successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
}

$stmt->close();
$conn->close();
?>
