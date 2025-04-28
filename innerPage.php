<?php
session_start();

// First: Check if user is logged in
if (!isset($_SESSION['userName']) || !isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

// Now safe to access session variables
$userName = $_SESSION['userName'];
$fullName = $_SESSION['fullName'];
$email = $_SESSION['email'];
$createdAt = $_SESSION['createdAt'];

// Second: Handle status alert (after login)
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    echo "<script>alert('Login successful!');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Gp Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Custom css  -->
  <link rel="stylesheet" href="userProfile.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages p-0">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>


      <!-- USER PROFILE AND THEIR DETAILS SHOWING -->
      <!-- User Icon Button + Dropdown -->
      <div class="user-container">
        <button class="btn-icon" onclick="togglePopup()">
          <div class="user-info">
            <span class="name-text"><?php echo htmlspecialchars($fullName); ?></span>
          </div>
          <i class="bi bi-person-circle"></i>
        </button>

        <!-- Dropdown Menu -->
        <div id="userPopup" class="dropdown-popup">
          <p class="welcome-text">Hello, <?php echo htmlspecialchars($fullName); ?>!</p>
          <button type="button" class="popup-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            👤 View Profile
          </button>

          <a href="/settings" class="popup-link">⚙️ Settings</a>
          <a href="logout.php" class="popup-link logout">🚪 Logout</a>
        </div>
      </div>

      <script>
        function togglePopup() {
          const popup = document.getElementById("userPopup");
          popup.style.display = popup.style.display === "block" ? "none" : "block";
        }

        // Close dropdown if clicked outside
        document.addEventListener("click", function(event) {
          const button = document.querySelector(".btn-icon");
          const popup = document.getElementById("userPopup");

          if (!button.contains(event.target) && !popup.contains(event.target)) {
            popup.style.display = "none";
          }
        });
      </script>

      <!-- JavaScript -->
      <script>
        function togglePopup() {
          const popup = document.getElementById('userPopup');
          popup.style.display = popup.style.display === 'flex' ? 'none' : 'flex';
        }

        // Optional: close popup if clicked outside the box
        window.addEventListener('click', function(e) {
          const popup = document.getElementById('userPopup');
          const content = document.querySelector('.popup-content');
          if (e.target === popup && !content.contains(e.target)) {
            popup.style.display = 'none';
          }
        });
      </script>

      <!-- END USER PROFILE AND THEIR DETAILS SHOWING -->
    </div>
  </header><!-- End Header -->


  <main id="main" class="p-0 m-0">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Inner Page</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->
    <h1>This page will be updated soon!</h1>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Gp<span>.</span></h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe for more updates.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Gp</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



  <!-- Modal to show the user details in popup windows -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content shadow-lg" style="border-radius: 1rem; border: none;">

        <!-- Header -->
        <div class="modal-header text-white"
          style="background: linear-gradient(135deg, #6f42c1, #9c27b0); border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
          <h5 class="modal-title" id="staticBackdropLabel">Profile Details</h5>
        </div>

        <!-- Body -->
        <div class="modal-body text-center px-4 py-4"
          style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #444;">
          <!-- Profile Picture -->
          <img src="https://via.placeholder.com/120" alt="Profile Picture"
            class="rounded-circle mb-3 shadow"
            style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #f8f9fa;">
          <h4 class="fw-semibold mb-4" style="color: #8e24aa;">
          <?php echo htmlspecialchars($fullName); ?>
          </h4>

          <!-- Details Section -->
          <div class="text-start d-grid gap-3 mx-auto" style="max-width: 350px;">

            <div class="d-flex align-items-start gap-3 border-bottom pb-2">
              <i class="bi bi-envelope-fill text-primary fs-5"></i>
              <div>
                <div class="fw-semibold">Email</div>
                <div><?php echo htmlspecialchars($email); ?></div>
              </div>
            </div>

            <div class="d-flex align-items-start gap-3 border-bottom pb-2">
              <i class="bi bi-telephone-fill text-success fs-5"></i>
              <div>
                <div class="fw-semibold">Account Created</div>
                <div><?php echo htmlspecialchars($createdAt); ?></div>
              </div>
            </div>

            <div class="d-flex align-items-start border-bottom pb-2 gap-3">
              <i class="bi bi-person-vcard-fill text-primary fs-5"></i>
              <div>
                <div class="fw-semibold">User Name</div>
                <div><?php echo htmlspecialchars($userName); ?></div>
              </div>
            </div>
            <!-- Change Password -->
            <div class="d-flex align-items-start border-bottom pb-2 gap-3">
              <i class="bi bi-lock-fill text-warning fs-5"></i>
              <div>
                <div class="fw-semibold mb-1">Password</div>
                <button class="btn btn-sm btn-outline-warning rounded-pill px-3 py-1"
                  style="font-size: 0.875rem;">Change Password</button>
              </div>
            </div>

          </div>
        </div>

        <!-- Footer -->
        <div class="modal-footer border-0 px-4 pb-4 pt-0 d-flex justify-content-end">
          <button type="button" class="btn btn-outline-secondary px-4 rounded-pill" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

</body>

</html>