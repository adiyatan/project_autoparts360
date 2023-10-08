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

  .dropdown-menu {
    right: 100; /* Put the dropdown menu on the right side */
    left: unset; /* Disable the default left positioning */
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
          <a class="nav-link" href="cart.php">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Setting</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
