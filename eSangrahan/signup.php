<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esangrahandb"; // Ensure same DB used for login too

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$userName = $_POST['userName'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Prepare statement
$stmt = $conn->prepare("INSERT INTO newusers (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstName, $lastName, $userName, $email, $password);

if ($stmt->execute()) {
    header("Location: login.html");
    exit(); // Always use exit after header redirect
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
