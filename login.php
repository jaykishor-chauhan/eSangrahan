<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esangrahandb"; // use same as signup

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$userName = $_POST['userName'];
$inputPassword = $_POST['password'];

// Prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM newusers WHERE username = ?");
$stmt->bind_param("s", $userName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $row = $result->fetch_assoc();

  if (password_verify($inputPassword, $row['password'])) {
    
    // Start session
    $_SESSION['username'] = $row['username'];
    $_SESSION['firstName'] = $row['first_name'];
    $_SESSION['email'] = $row['email'];
    echo "<script>alert('Welcome " . $row['first_name'] . "! You have successfully logged in.');</script>";
    $_SESSION['just_logged_in'] = true;

    header("Location: innerPage.php");
    exit();
  } else {
    // print_r($row);
    echo "<script>alert('Incorrect password.'); window.location.href = 'login.html';</script>";
  }
} else {
  echo "<script>alert('User not found.'); window.location.href = 'login.html';</script>";
}

$stmt->close();
$conn->close();
?>
