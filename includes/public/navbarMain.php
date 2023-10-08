<style>
  /* Navbar Styles */
  .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #f8f9fa;
    z-index: 1000;
  }

  .navbar-brand {
    font-weight: bold;
    color: #0047ab;
  }

  .nav-link {
    color: #333;
  }

  .form-control {
    border-color: #ccc;
  }

  .btn-outline-primary {
    border-color: #0047ab;
    color: #0047ab;
  }

  .btn-outline-primary:hover {
    background-color: unset;
    color: #0047ab;
  }

  .btn-primary {
    background-color: #0047ab;
    color: #fff;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="about/index.php">AutoParts360</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item nav-item-category">
          <a class="nav-link" href="#">Category</a>
        </li>
      </ul>
      <form class="d-flex flex-grow-1">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      </form>
      <ul class="navbar-nav ms-3">
        <li class="nav-item">
          <a class="nav-link btn-outline-primary" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-primary" href="regist.php">Regist</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php include 'includes/public/toast.php'; ?>

<!-- Your other JavaScript libraries and scripts here -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector(".form-control");
    const offCanvasMenu = document.querySelector(".off-canvas-menu");
    const offCanvasMenuBtn = document.getElementById("offCanvasMenuBtn");
    const offCanvasCloseBtn = document.getElementById("offCanvasCloseBtn");
    const toast = new bootstrap.Toast(document.querySelector(".toast"));

    searchInput.addEventListener("click", function() {
      // Here, you can check if the user is logged in or not
      const isLoggedIn = false; // Replace 'false' with your logic to check if the user is logged in

      if (!isLoggedIn) {
        toast.show();
      }
    });

    offCanvasMenuBtn.addEventListener("click", function() {
      offCanvasMenu.classList.add("active");
    });

    offCanvasCloseBtn.addEventListener("click", function() {
      offCanvasMenu.classList.remove("active");
    });
  });

  
</script>