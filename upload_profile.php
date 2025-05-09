<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esangrahandb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve email from POST data
$email = isset($_POST['email']) ? $_POST['email'] : '';
echo "Email: " . htmlspecialchars($email);
if (!$email) {
  die("=>No email provided.");
}

// Directory for uploads
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Get file details
$target_file = $target_dir . basename($_FILES["profileImage"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Validate image file
$check = getimagesize($_FILES["profileImage"]["tmp_name"]);
if ($check === false) {
    die("File is not an image.");
}


// Attempt to move the file to the target directory
if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
    // Update the user's profile image in the database based on email
    $sql = "UPDATE users SET profile_image='$target_file' WHERE email='$email'";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to innerPage.php (passing email if needed)
        header("Location: innerPage.php?email=" . urlencode($email));
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

$conn->close();
?>
