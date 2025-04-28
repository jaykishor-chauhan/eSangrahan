<?php
// check_email.php
header('Content-Type: application/json');

// Get the email from the POST data
$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'];

// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Check if the email exists in the database
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['exists' => true]);
} else {
    echo json_encode(['exists' => false]);
}

$stmt->close();
$conn->close();
?>
