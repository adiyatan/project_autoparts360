<?php
require '../includes/functions.php';

session_start();
$id_user = $_SESSION['id'];

$message = '';

if (isset($_POST["submit"])) {
  $result = editProfile($_POST);
  if ($result === true) {
    $message = '<div class="alert alert-success">Profile updated successfully</div>';
  } else {
    $message = '<div class="alert alert-danger">Failed to update profile</div>';
  }
}

?>

<style>
  .alert {
    margin-top: 10px;
  }

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
    right: 0;
    left: auto;
    position: absolute;
  }

  .modal-content {
    background-color: #f1f1f1;
  }

  .modal-header .close {
    color: #0047ab;
    font-size: 30px;
  }

  .modal-body img {
    max-width: 100px;
    max-height: 100px;
    width: auto;
    height: auto;
    display: block;
    margin: 0 auto;
  }

  /* Tambahkan kode berikut ke dalam CSS Anda */
  .profile-image-container {
    width: 120px;
    height: 120px;
    margin: 0 auto;
    overflow: hidden;
    border-radius: 80%;
  }

  .profile-image {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
    display: block;
    margin: 0 auto;
    border-radius: 50%;
    object-fit: cover;
    object-position: center center;
  }


  #submit:hover {
    background-color: #0047ab;
    color: #fff;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="">AutoParts360</a>
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
          <li class="nav-item">
            <a class="nav-link" href="#" id="userModal" role="button" data-bs-toggle="modal" data-bs-target="#userEditModal">
              <i class="fas fa-user"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- User Edit Modal -->
  <form method="post" action="" enctype="multipart/form-data">
    <div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="userEditModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="userEditModalLabel">Edit User Profile</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <!-- Form for editing user profile -->
              <div class="form-container">
                <!-- Di dalam modal-body -->
                <div class="mb-3 text-center">
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$id_user'") or die('query failed');
                  if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                  }
                  ?>
                  <div class="profile-image-container">
                    <?php if ($fetch['profile_picture'] == '') : ?>
                      <img src="../../assets/img/6.png" alt="Default Profile Image" class="profile-image">
                    <?php else : ?>
                      <img src="../../assets/img/<?php echo $fetch['profile_picture']; ?>" alt="Profile Image" class="profile-image">
                    <?php endif; ?>
                  </div>
                  <br>
                  <label for="profilePhoto" class="btn btn-primary" style="margin-top: -10px;">Choose Image</label>
                  <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" style="display: none;">
                  <img id="previewImage" src="" alt="Preview" style="margin-top:12px; max-width: 100px; max-height: 100px; display: none;">
                  <!-- Tampilkan foto profil saat ini -->
                </div>

                <div class="mb-3">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo $fetch['username']; ?>">
                </div>
                <div class="mb-3">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $fetch['first_name']; ?>">
                </div>
                <div class="mb-3">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $fetch['last_name']; ?>">
                </div>
                <div class="mb-3">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="<?php echo $fetch['full_address']; ?>">
                </div>
                <div class="mb-3">
                  <label for="password">New Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <p><?php echo $message; ?></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="submit" name="submit">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    document.getElementById('userModal').addEventListener('click', function() {
      $('#userEditModal').modal('show');
    });
  </script>
  <script>
    // Add this code inside your JavaScript
    document.getElementById('profilePhoto').addEventListener('change', function() {
      const fileInput = this;
      const previewImage = document.getElementById('previewImage');

      // Check if a file is selected
      if (fileInput.files.length > 0) {
        const selectedFile = fileInput.files[0];

        // Check if the selected file is an image
        if (selectedFile.type.startsWith('image/')) {
          const reader = new FileReader();

          // Update the preview image source with the selected file
          reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
          };

          reader.readAsDataURL(selectedFile);
        } else {
          // Display an error message if the selected file is not an image
          alert('Please select a valid image file.');
          fileInput.value = ''; // Clear the file input
        }
      } else {
        // Hide the preview image if no file is selected
        previewImage.style.display = 'none';
      }
    });
  </script>
</body>