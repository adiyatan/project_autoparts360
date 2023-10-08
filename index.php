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

</head>

<body>
  <div class="nav-main">
    <?php include 'includes/public/navbarMain.php'; ?>
  </div>
  <div class="nav-responsive">
    <?php include 'includes/public/navbarResponsive.php'; ?>
  </div>



  <!-- Offcanvas Markup -->
  <?php include 'includes/public/canvasMain.php'; ?>

  <!-- Main content here -->
  <div class="container mt-4">
    <div class="custom-container">

      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle mr-2"></i>
        <p>&nbsp;</p>
        <div>
          Kindly proceed to <a href="login.php">Log in</a> to fully utilize our services. Thank you for your understanding and cooperation.
        </div>
      </div>

      <!-- badge -->
      <?php include 'includes/public/badge.php'; ?>

      <!-- flashsale -->
      <?php include 'includes/public/flashsale.php'; ?>

      <!-- toast -->
      <?php include 'includes/public/toast.php'; ?>


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