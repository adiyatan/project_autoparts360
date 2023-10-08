<?php
// Include the database connection details
require 'includes/functions.php';

$message = '';

if (isset($_POST["submit"])) {
    $result = register($_POST);
    if ($result) {
        header("Location: login.php?message=success");
        exit;
    } else {
        $registrationData = $_POST;
        $message = '<div class="alert alert-danger">Failed to register!</div>';
    }    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoParts360 Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 42px;
            color: #0047ab;
            font-weight: bold;
        }

        .tagline {
            color: #666;
            font-style: italic;
        }

        .form-wrapper {
            margin-top: 30px;
        }

        /* Custom styling for form elements */
        .form-label {
            font-weight: bold;
            color: #0047ab;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0047ab;
        }

        .form-check-label::before {
            content: "";
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border: 2px solid #0047ab;
            border-radius: 3px;
            /* Tambahkan properti position dan top untuk mengatur posisi ikon */
            position: absolute;
            top: 5px;
            left: 0;
            /* Ubah nilai left menjadi 0 */
        }

        .form-check-input:checked+.form-check-label::before {
            background-color: #0047ab;
            border-color: #0047ab;
        }

        .form-check-input:checked+.form-check-label::after {
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            display: inline-block;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            color: #fff;
            position: absolute;
            top: 3px;
            left: 3px;
        }

        .form-check-label {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }

        .form-check-label:hover::before {
            border-color: #002c7a;
        }

        .form-check-label:hover::after {
            color: #002c7a;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-image {
            max-width: 200px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #0047ab;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #002c7a;
        }

        /* Custom styling for error messages */
        .invalid-feedback {
            color: #ff4d4d;
            font-size: 14px;
            display: none;
        }

        /* Additional custom styles for a more elegant look */
        .form-group {
            margin-bottom: 20px;
        }

        .form-control.is-invalid {
            border-color: #ff4d4d;
        }

        .form-control.is-valid,
        .was-validated .form-control:valid {
            border-color: #28a745;
        }

        .form-control.is-invalid,
        .was-validated .form-control:invalid {
            border-color: #0047ab;
        }

        .progress {
            height: 10px;
            margin-bottom: 0;
            border-radius: 5px;
            background-color: #f2f2f2;
        }

        .progress-bar {
            border-radius: 5px;
        }

        /* Custom styling for the checkbox */
        .form-check-input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .form-check-label::before {
            content: "";
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border: 2px solid #0047ab;
            border-radius: 3px;
            position: absolute;
            top: 5px;
            left: 0;
            /* Ubah nilai left menjadi 0 */
        }

        .form-check-input:checked+.form-check-label::before {
            background-color: #0047ab;
            border-color: #0047ab;
        }

        .form-check-input:checked+.form-check-label::after {
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            display: inline-block;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            color: #fff;
            position: absolute;
            top: 3px;
            left: 3px;
        }

        .form-check-label {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }

        .form-check-label:hover::before {
            border-color: #002c7a;
        }

        .form-check-label:hover::after {
            color: #002c7a;
        }

        /* Custom styling for form header */
        .form-header {
            background-color: #0047ab;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 24px;
        }

        /* Custom styling for the form footer */
        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .form-footer p {
            color: #666;
        }

        .form-footer a {
            color: #0047ab;
            font-weight: bold;
            text-decoration: none;
        }

        .form-footer a:hover {
            color: #002c7a;
        }

        /* Custom styling for the password strength bar */
        .password-strength-bar-container {
            margin-top: 10px;
            position: relative;
        }

        .password-strength-bar {
            height: 10px;
            border-radius: 5px;
            background-color: #f2f2f2;
        }

        .password-strength-bar-level-1 {
            background-color: #ff4d4d;
        }

        .password-strength-bar-level-2 {
            background-color: #ffa500;
        }

        .password-strength-bar-level-3 {
            background-color: #ffd700;
        }

        .password-strength-bar-level-4 {
            background-color: #7cff81;
        }

        /* Password toggle styles */
        .password-toggle {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 20px;
            /* Adjust the right margin here */
            transform: translateY(-50%);
            color: #666;
            font-size: 16px;
        }

        .password-toggle i {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="header">
            <h1 class="text-center">AutoParts360</h1>
            <div class="logo-container">
                <img src="assets/img/6.png" alt="AutoParts360" class="img-fluid logo-image">
            </div>
            <h4 class="tagline text-center">Your Trusted Auto Parts Supplier</h4>
        </div>
        <div class="form-wrapper">
            <div class="form-header">Registration Form</div>
            <form class="row g-3 needs-validation" novalidate id="registration-form" onsubmit="validateForm(event)" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="first-name" class="form-label">First name</label>
                    <input type="text" class="form-control" id="first-name" name="first-name" required value="<?php echo isset($registrationData['first-name']) ? $registrationData['first-name'] : ''; ?>">
                    <div class="invalid-feedback">
                        Please provide your first name.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="last-name" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="last-name" name="last-name" required value="<?php echo isset($registrationData['last-name']) ? $registrationData['last-name'] : ''; ?>">
                    <div class="invalid-feedback">
                        Please provide your last name.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="province" class="form-label">Province</label>
                    <select class="form-control" id="province" name="province" required>
                        <option value="" disabled selected>Select your province</option>
                        <!-- Add more options as needed -->
                    </select>
                    <div class="invalid-feedback">
                        Please select a province.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <select class="form-control" id="city" name="city" required>
                        <option value="" disabled selected>Select your city</option>
                        <!-- Tambahkan opsi pilihan kota lainnya sesuai kebutuhan -->
                    </select>
                    <div class="invalid-feedback">
                        Please select a city.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="number" class="form-control" name="zip" id="zip" required value="<?php echo isset($registrationData['zip']) ? $registrationData['zip'] : ''; ?>">
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="full-address" class="form-label">Full Address</label>
                    <input type="text" class="form-control" id="full-address" name="full-address" required value="<?php echo isset($registrationData['full-address']) ? $registrationData['full-address'] : ''; ?>">
                    <div class="invalid-feedback">
                        Please provide your full address.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="profile-picture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profile-picture" name="profile-picture">
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text" id="username-addon">@</span>
                        <input type="text" class="form-control" id="username" name="username" required value="<?php echo isset($registrationData['username']) ? $registrationData['username'] : ''; ?>">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                            <i class="far fa-eye" id="password-toggle-icon"></i>
                        </span>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="password-strength-bar-container">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="password-strength-bar"></div>
                        </div>
                        <div class="text-center mt-2">
                            <small>Password Strength</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm-password" required>
                        <span class="password-toggle" onclick="togglePasswordVisibility('confirm-password')">
                            <i class="far fa-eye" id="confirm-password-toggle-icon"></i>
                        </span>
                        <div class="invalid-feedback">
                            Please confirm your password.
                        </div>
                    </div>
                    <!-- Add a new element to display password match status -->
                    <div id="password-match-message" class="invalid-feedback" style="display: none; color:green;">
                        Passwords match.
                    </div>
                    <div id="password-not-match-message" class="invalid-feedback" style="display: none;">
                        Passwords do not match.
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="terms-check" required oninvalid="this.setCustomValidity('You must agree before submitting.')">
                    <label class="form-check-label" for="terms-check">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" onclick="validateForm(event)" name="submit">Submit form</button>
                </div>
                <div class="form-footer">
                    <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
            <div class="form-footer">
                <p>&copy; 2023 AutoParts360. All rights reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script>
        // Show/hide password function
        function togglePasswordVisibility(inputId) {
            const inputElement = document.getElementById(inputId);
            const toggleIcon = document.getElementById(`${inputId}-toggle-icon`);
            if (inputElement.type === "password") {
                inputElement.type = "text";
                toggleIcon.classList.remove("far", "fa-eye");
                toggleIcon.classList.add("far", "fa-eye-slash");
            } else {
                inputElement.type = "password";
                toggleIcon.classList.remove("far", "fa-eye-slash");
                toggleIcon.classList.add("far", "fa-eye");
            }
        }

        // Check password strength
        function checkPasswordStrength(password) {
            // Implement your password strength checking logic here
            // For this example, let's consider 4 levels of password strength
            // Weak: 0-25%, Medium: 25-50%, Strong: 50-75%, Very Strong: 75-100%
            const passwordStrengthBar = document.getElementById("password-strength-bar");
            let strengthLevel = 0;
            if (password.length >= 8) strengthLevel += 25;
            if (password.match(/[A-Z]/)) strengthLevel += 25;
            if (password.match(/[0-9]/)) strengthLevel += 25;
            if (password.match(/[$@#&!]/)) strengthLevel += 25;
            passwordStrengthBar.style.width = strengthLevel + "%";
            if (strengthLevel <= 25) {
                passwordStrengthBar.classList.remove("bg-warning", "bg-info", "bg-success");
                passwordStrengthBar.classList.add("bg-danger");
            } else if (strengthLevel <= 50) {
                passwordStrengthBar.classList.remove("bg-danger", "bg-info", "bg-success");
                passwordStrengthBar.classList.add("bg-warning");
            } else if (strengthLevel <= 75) {
                passwordStrengthBar.classList.remove("bg-danger", "bg-warning", "bg-success");
                passwordStrengthBar.classList.add("bg-info");
            } else {
                passwordStrengthBar.classList.remove("bg-danger", "bg-warning", "bg-info");
                passwordStrengthBar.classList.add("bg-success");
            }
        }

        // Password strength check on input
        const passwordInput = document.getElementById("password");
        passwordInput.addEventListener("input", function() {
            checkPasswordStrength(this.value);
            confirmPasswordInput.dispatchEvent(new Event('input')); // Trigger confirmPasswordInput input event to check password match
        });

        // Confirm password match check on input
        const confirmPasswordInput = document.getElementById("confirm-password");
        confirmPasswordInput.addEventListener("input", function() {
            const passwordValue = passwordInput.value;
            const confirmPasswordValue = this.value;
            if (passwordValue === confirmPasswordValue) {
                // If passwords match, show the "Passwords match" message and hide the "Passwords do not match" message
                document.getElementById("password-match-message").style.display = "block";
                document.getElementById("password-not-match-message").style.display = "none";
                this.setCustomValidity("");
            } else {
                // If passwords do not match, show the "Passwords do not match" message and hide the "Passwords match" message
                document.getElementById("password-match-message").style.display = "none";
                document.getElementById("password-not-match-message").style.display = "block";
                this.setCustomValidity("Passwords do not match.");
            }
        });
    </script>

    <script>
        function validateForm(event) {
            const termsCheck = document.getElementById("terms-check");
            if (!termsCheck.checked) {
                // Prevent form submission if the checkbox is not checked
                event.preventDefault();
                // Show the error message
                document.querySelector(".invalid-feedback").style.display = "block";
            }
        }
    </script>

    <script>
        function validateForm(event) {
            // Ambil semua elemen input yang perlu divalidasi
            const firstNameInput = document.getElementById("first-name");
            const lastNameInput = document.getElementById("last-name");
            const provinceInput = document.getElementById("province");
            const cityInput = document.getElementById("city");
            const zipInput = document.getElementById("zip");
            const fullAddressInput = document.getElementById("full-address");
            const usernameInput = document.getElementById("username");
            const passwordInput = document.getElementById("password");
            const confirmPasswordInput = document.getElementById("confirm-password");
            const termsCheck = document.getElementById("terms-check");

            // Fungsi untuk menampilkan pesan kesalahan jika input kosong
            function showErrorMessage(inputElement, message) {
                const errorElement = inputElement.nextElementSibling;
                errorElement.textContent = message;
                errorElement.style.display = "block";
                inputElement.classList.add("is-invalid");
            }

            // Fungsi untuk menyembunyikan pesan kesalahan jika input sudah diisi
            function hideErrorMessage(inputElement) {
                const errorElement = inputElement.nextElementSibling;
                errorElement.style.display = "none";
                inputElement.classList.remove("is-invalid");
            }

            // Validasi First name
            if (firstNameInput.value.trim() === "") {
                showErrorMessage(firstNameInput, "Please provide your first name.");
            } else {
                hideErrorMessage(firstNameInput);
            }

            // Validasi Last name
            if (lastNameInput.value.trim() === "") {
                showErrorMessage(lastNameInput, "Please provide your last name.");
            } else {
                hideErrorMessage(lastNameInput);
            }

            // Validasi Province
            if (provinceInput.value === "") {
                showErrorMessage(provinceInput, "Please select a province.");
            } else {
                hideErrorMessage(provinceInput);
            }

            // Validasi City
            if (cityInput.value.trim() === "") {
                showErrorMessage(cityInput, "Please provide a valid city.");
            } else {
                hideErrorMessage(cityInput);
            }

            // Validasi Zip
            if (zipInput.value.trim() === "") {
                showErrorMessage(zipInput, "Please provide a valid zip.");
            } else {
                hideErrorMessage(zipInput);
            }

            // Validasi Full Address
            if (fullAddressInput.value.trim() === "") {
                showErrorMessage(fullAddressInput, "Please provide your full address.");
            } else {
                hideErrorMessage(fullAddressInput);
            }

            // Validasi Username
            if (usernameInput.value.trim() === "") {
                showErrorMessage(usernameInput, "Please choose a username.");
            } else {
                hideErrorMessage(usernameInput);
            }

            // Validasi Password
            if (passwordInput.value.trim() === "") {
                showErrorMessage(passwordInput, "Please provide a password.");
            } else {
                hideErrorMessage(passwordInput);
            }

            // Validasi Confirm Password
            if (confirmPasswordInput.value.trim() === "") {
                showErrorMessage(confirmPasswordInput, "Please confirm your password.");
            } else {
                hideErrorMessage(confirmPasswordInput);
            }

            // Validasi Terms and Conditions
            if (!termsCheck.checked) {
                showErrorMessage(termsCheck, "You must agree before submitting.");
            } else {
                hideErrorMessage(termsCheck);
            }

            // Check password match
            if (passwordInput.value !== confirmPasswordInput.value) {
                showErrorMessage(confirmPasswordInput, "Passwords do not match.");
            } else {
                hideErrorMessage(confirmPasswordInput);
            }

            // Prevent form submission if there are any errors
            if (
                firstNameInput.value.trim() === "" ||
                lastNameInput.value.trim() === "" ||
                provinceInput.value === "" ||
                cityInput.value.trim() === "" ||
                zipInput.value.trim() === "" ||
                fullAddressInput.value.trim() === "" ||
                usernameInput.value.trim() === "" ||
                passwordInput.value.trim() === "" ||
                confirmPasswordInput.value.trim() === "" ||
                !termsCheck.checked ||
                passwordInput.value !== confirmPasswordInput.value
            ) {
                event.preventDefault();
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data for provinces and cities
            const provinces = [{
                    id: 1,
                    name: 'Jawa Barat'
                },
                {
                    id: 2,
                    name: 'Jawa Tengah'
                },
                {
                    id: 3,
                    name: 'DI Yogyakarta'
                },
                {
                    id: 4,
                    name: 'Jawa Timur'
                },
            ];

            const cities = [{
                    id: 35,
                    provinceId: 1,
                    name: 'Bogor'
                },
                {
                    id: 36,
                    provinceId: 1,
                    name: 'Sukabumi'
                },
                {
                    id: 37,
                    provinceId: 1,
                    name: 'Cimahi'
                },
                {
                    id: 38,
                    provinceId: 1,
                    name: 'Depok'
                },
                {
                    id: 39,
                    provinceId: 2,
                    name: 'Semarang'
                },
                {
                    id: 40,
                    provinceId: 2,
                    name: 'Surakarta'
                },
                {
                    id: 41,
                    provinceId: 2,
                    name: 'Salatiga'
                },
                {
                    id: 42,
                    provinceId: 3,
                    name: 'Yogyakarta'
                },
                {
                    id: 43,
                    provinceId: 4,
                    name: 'Surabaya'
                },
                {
                    id: 44,
                    provinceId: 4,
                    name: 'Malang'
                },
                {
                    id: 45,
                    provinceId: 4,
                    name: 'Batu'
                }
            ];


            // Function to populate province dropdown
            function populateProvinces() {
                const provinceSelect = document.getElementById('province');
                provinces.forEach((province) => {
                    const option = document.createElement('option');
                    option.value = province.id;
                    option.textContent = province.name;
                    provinceSelect.appendChild(option);
                });
            }

            // Function to populate city dropdown based on selected province
            function populateCities(provinceId) {
                const citySelect = document.getElementById('city');
                citySelect.innerHTML = '<option value="" disabled selected>Select your city</option>';
                const citiesInProvince = cities.filter((city) => city.provinceId === provinceId);
                citiesInProvince.forEach((city) => {
                    const option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });
            }

            // Event listener for province selection change
            const provinceSelect = document.getElementById('province');
            provinceSelect.addEventListener('change', function() {
                const selectedProvinceId = parseInt(this.value);
                populateCities(selectedProvinceId);
            });

            // Call the function to populate provinces on page load
            populateProvinces();
        });
    </script>


</body>

</html>