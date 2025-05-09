<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Image Upload</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Global Styles */
    body {
      background-color: #f4f7fa;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    /* Container for the card */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      width: 320px; /* Fixed width to make it smaller */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
      text-align: center;
    }
    .card-header {
      background-color: #007bff;
      color: white;
      padding: 10px;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
    }
    /* Profile Image Styling */
    .profile-img-preview {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 20px auto; /* Center the image horizontally and add margin bottom */
      display: block;
      transition: border-color 0.3s ease;
    }
    .form-label {
      font-weight: bold;
      margin-bottom: 8px;
    }
    .btn {
      background-color: #007bff;
      border-color: #007bff;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      width: 100%;
      transition: background-color 0.3s;
    }
    .btn:hover {
      background-color: #0056b3;
    }
    .mb-3 {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <!-- Profile Image Preview -->
      <img id="profileImagePreview" src="https://i.pinimg.com/736x/01/4e/f2/014ef2f860e8e56b27d4a3267e0a193a.jpg" alt="Profile Image" class="profile-img-preview">
      <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
        <!-- Hidden Input to Pass Email -->
        <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
        
        <div class="mb-3">
          <label for="profileImage" class="form-label">Select New Profile</label>
          <input type="file" class="form-control" id="profileImage" name="profileImage" accept="image/*" onchange="previewImage(event)" required>
        </div>
        <button type="submit" class="btn">Upload Profile</button>
      </form>
    </div>
  </div>

  <script>
    // JavaScript for Image Preview
    function previewImage(event) {
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = function() {
        document.getElementById('profileImagePreview').src = reader.result;
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    }
  </script>
</body>
</html>
