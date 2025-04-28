<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esangrahandb"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the POST request
$fullName = trim($_POST['fullName']); 
$userName = trim($_POST['userName']);
$email = trim($_POST['email']);
$inputPassword = $_POST['password'];

// Sanitize inputs (Basic example)
$fullName = htmlspecialchars($fullName);
$userName = htmlspecialchars($userName);
$email = htmlspecialchars($email);

// Check if username or email already exists in the database
$stmt = $conn->prepare("SELECT id FROM newusers WHERE userName = ? OR email = ?");
$stmt->bind_param("ss", $userName, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Username or email already exists
    echo "<script>alert('Username or Email already exists.'); window.location.href = 'signup.html';</script>";
    exit(); // Stop further code execution
}

// Hash the password
$password = password_hash($inputPassword, PASSWORD_DEFAULT); // Hash the password

// Set createdAt to current timestamp
$createdAt = date('Y-m-d H:i:s');

// Prepare the statement to insert data
$stmt = $conn->prepare("INSERT INTO newusers (fullName, userName, email, password, createdAt) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $fullName, $userName, $email, $password, $createdAt);

// Execute the query and handle success or failure
if ($stmt->execute()) {
    // Success message with redirect
    echo "<script>alert('You have successfully registered!'); window.location.href = 'login.html';</script>";
    exit(); // Always use exit after header redirect
} else {
    // Output error if the insertion fails
    echo "<script>alert('Error: " . $stmt->error . "'); window.location.href = 'signup.html';</script>";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
