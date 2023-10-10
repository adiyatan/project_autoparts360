<?php
session_start();

$username = $_SESSION['username'];

if (!isset($username)) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['logout'])) {
    // Hapus semua data sesi
    session_destroy();

    // Redirect ke halaman login
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoParts360 - Jual Beli Sparepart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styleIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        /* CSS untuk mengatur tampilan teks di bawah "container" */
        .under-construction {
            text-align: center;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        .under-construction p {
            margin: 10px 0;
        }
    </style>

</head>

<body>
    <div class="nav-main">
        <?php include '../includes/member/navbarMain.php'; ?>
    </div>
    <div class="nav-responsive">
        <!-- <?php include 'includes/member/navbarResponsive.php'; ?> -->
    </div>



    <!-- Offcanvas Markup -->
    <!-- <?php include 'includes/public/canvasMain.php'; ?> -->

    <!-- Main content here -->
    <div class="container mt-4">
        <div class="custom-container">

            <div class="under-construction">
                <br>
                <br>
                <br>
                <br>
                <br>
                <p>We apologize for the inconvenience. Our website is currently undergoing maintenance, and we anticipate it will be completed by the end of October.</p>
                <p>Thank you for your patience.</p>
                <a href="?logout=1" class="btn btn-danger">Log Out</a>
            </div>
            <!-- badge -->
            <!-- <?php include 'includes/public/badge.php'; ?> -->

            <!-- flashsale -->
            <!-- <?php include 'includes/public/flashsale.php'; ?> -->


        </div>
    </div>

    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        // Function to show the offcanvas when hovering over the "Category" link
        function showOffcanvas() {
            const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasCategory'));
            offcanvas.show();
        }

        // Function to hide the offcanvas when the mouse leaves the offcanvas area
        function hideOffcanvas() {
            const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasCategory'));
            offcanvas.hide();
        }

        // Attach the event listeners to the "Category" link and the offcanvas
        const categoryLink = document.querySelector('.nav-item-category');
        const offcanvasElement = document.getElementById('offcanvasCategory');

        categoryLink.addEventListener('mouseenter', showOffcanvas);
        offcanvasElement.addEventListener('mouseleave', hideOffcanvas);

        function toggleNavigation() {
            const desktopNav = document.querySelector('.nav-main');
            const mobileNav = document.querySelector('.nav-responsive');
            const width = window.innerWidth;

            if (width >= 768) { // If the width is greater or equal to tablet width (768px), show desktopNav
                desktopNav.style.display = 'block';
                mobileNav.style.display = 'none';
            } else { // Otherwise, show mobileNav
                desktopNav.style.display = 'none';
                mobileNav.style.display = 'block';
            }
        }

        // Call the toggleNavigation function initially and whenever the window is resized
        toggleNavigation();
        window.addEventListener('resize', toggleNavigation);
    </script>
    <script>
        // Show the toast when the page loads
        window.addEventListener('load', function() {
            const toast = new bootstrap.Toast(document.querySelector('.toast'));
            toast.show();
        });
    </script>


</body>

</html>