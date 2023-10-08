<?php
require 'functions.php';

// Initialize a variable to track form submission status
$submissionStatus = "";

// cek tombol submit
if (isset($_POST['submitButton'])) {
  if (tambah($_POST) > 0) {
    // Set submissionStatus to 'success' if data added successfully
    $submissionStatus = "success";
  } else {
    // Set submissionStatus to 'failed' if data failed to add
    $submissionStatus = "failed";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AutoParts360 | Jual Sparepart</title>
  <!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Your custom CSS (if any) -->
  <link rel="stylesheet" href="style.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Hero section with a carousel -->
  <section class="hero-section fade-in" id="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 id="welcomeTitle">Selamat Datang di AutoParts360</h1>
          <p id="welcomeDescription">Temukan berbagai produk sparepart terbaik untuk balapan Anda.</p>
          <a href="../index.php" class="btn btn-primary" id="btnLihat">Lihat Produk</a>
        </div>
        <div class="col-lg-6">
          <!-- Carousel -->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../assets/img/1.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../assets/img/2.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../assets/img/3.png" alt="Third slide">
              </div>
            </div>
          </div>
          <!-- End of Carousel -->
        </div>
      </div>
    </div>
  </section>



  <!-- About section -->
  <section class="about-section fade-in" id="about-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <img src="../assets/img/4.png" alt="About" class="img-fluid">
        </div>
        <div class="col-lg-6">
          <h2 id="aboutUs">Tentang Kami</h2>
          <p id="par1">AutoParts360 adalah sebuah perusahaan yang telah beroperasi di industri penjualan sparepart kendaraan selama lebih dari 20 tahun. Sebagai perusahaan keluarga, kami memiliki komitmen kuat untuk menyediakan layanan berkualitas tinggi kepada pelanggan kami. Dengan pengalaman yang luas dan pengetahuan mendalam tentang dunia otomotif, kami menjadi tujuan utama bagi pelanggan yang mencari berbagai macam sparepart mobil dan motor dari berbagai merek dan model.</p>
          <p id="par2">AutoParts360 menawarkan beragam produk berkualitas tinggi, termasuk sparepart mesin, sistem rem, sistem suspensi, komponen listrik, dan banyak lagi untuk kendaraan roda dua dan roda empat. Setiap produk dilengkapi dengan deskripsi detail dan informasi ketersediaan stok untuk memudahkan pelanggan dalam pemilihan dan pembelian.</p>
          <a href="#" class="btn btn-secondary" id="learn">Pelajari Lebih Lanjut</a>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-section fade-in" id="contact-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h2 id="contactTitle">Our Location</h2>
          <div style="position: relative; overflow: hidden; ">
            <!-- Google Maps embed code here -->
            <!-- Replace "YOUR_EMBED_CODE" with the code you obtained from Google Maps -->
            <!-- Make sure to keep the height and width values as specified in the embed code -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.2717027832224!2d107.62286409701221!3d-6.880203042094825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e702148eddc7%3A0x31b0b0ea4eab4808!2sJl.%20Alam%20Kanayakan%20No.50%2C%20Cigadung%2C%20Kec.%20Cibeunying%20Kaler%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040191!5e0!3m2!1sid!2sid!4v1690370514725!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="col-lg-6">
            <h2 id="contactTitle">Contact Us</h2>
            <form id="contactForm" action="#" method="POST">
              <div class="form-group">
                <label for="fullName" id="fullNameLabel">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
              </div>
              <div class="form-group">
                <label for="email" id="emailLabel">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="message" id="messageLabel">Message or request to credential admin</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="submitButton" id="submitButton">Submit</button>
            </form>
            <!-- The success message should be inside the "success-message" div -->
            <div id="berhasil" class="success-message <?php echo ($submissionStatus === 'success') ? 'show' : ''; ?>" style="color: #00FF00;">
              Thank you for your message! We will get back to you soon.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer bg-dark text-white py-3">
    <div class="container text-center">
      <p>&copy; <?php echo date('Y'); ?> AutoParts360. All rights reserved.</p>
      <p>made with love &hearts; <a href="https://github.com/adiyatan">@adiyatan</a></p>
      <p>Email: adiyazam@gmail.com</p>
    </div>
  </footer>


  <!-- Language toggle buttons -->
  <div class="language-toggle fixed-right">
    <button id="englishBtn" onclick="changeLanguage('en')">English</button>
    <button id="indonesianBtn" onclick="changeLanguage('id')">Indonesian</button>
  </div>


  <!-- Link Bootstrap JS (Popper.js and Bootstrap.js required) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Your custom JavaScript (if any) -->
  <script src="app.js"></script>

  <script src="translate.js"></script>
  <script>
    // Function to keep the success message on the contact section
    document.addEventListener("DOMContentLoaded", function() {
      const successMessage = document.querySelector(".success-message");
      const contactSection = document.getElementById("contact-section");

      // Check if the success message is visible
      if (successMessage.classList.contains("show")) {
        // Scroll to the contact section to keep the message visible
        contactSection.scrollIntoView();
      }
    });
  </script>



</body>

</html>