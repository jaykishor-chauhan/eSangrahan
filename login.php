<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esangrahandb"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST data exists
if (isset($_POST['userName']) && isset($_POST['password'])) {
    
    // Get input values and sanitize
    $userName = trim($_POST['userName']);
    $inputPassword = trim($_POST['password']);
    
    // Prepare SQL to find user
    $stmt = $conn->prepare("SELECT * FROM newusers WHERE userName = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        if (password_verify($inputPassword, $row['password'])) {
            // Correct password
            session_regenerate_id(true);
            
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['fullName'] = $row['fullName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['createdAt'] = $row['createdAt'];

            // Login success alert and redirect using JavaScript
            echo "<script>
                alert('Login successful!');
                window.location.href = 'innerPage.php';
            </script>";
            exit();
        } else {
            // Incorrect password
            echo "<script>
                alert('Incorrect Password. Please try again.');
                window.location.href = 'login.html';
            </script>";
            exit();
        }
    } else {
        // Username not found
        echo "<script>
            alert('User not found. Please check your username.');
            window.location.href = 'login.html';
        </script>";
        exit();
    }
} else {
    // No POST data
    header("Location: login.html");
    exit();
}

// Close connections
$stmt->close();
$conn->close();
?>
