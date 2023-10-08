<?php

$conn = mysqli_connect("localhost", "root", "", "autoparts360");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo mysqli_error($conn);
    }

    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }
    return $datas;
}

function register($data)
{
    global $conn;

    $firstName = htmlspecialchars(ucwords($data["first-name"]));
    $lastName = htmlspecialchars(ucwords($data["last-name"]));
    $province = htmlspecialchars($data["province"]);
    $city = htmlspecialchars($data["city"]);
    $zip = htmlspecialchars($data["zip"]);
    $fullAddress = htmlspecialchars($data["full-address"]);
    $username = htmlspecialchars($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);

    $picture = upload();
    if (!$picture) {
        return false;
    }

    // Check if the username already exists
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username already exists.');
                </script>";
        return false;
    }

    // Encrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (first_name, last_name, province, city, zip, full_address, username, password, profile_picture) 
            VALUES ('$firstName', '$lastName', '$province', '$city', '$zip', '$fullAddress', '$username', '$password', '$picture')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "<script>
                alert('Failed to register.');
                </script>";
        return false;
    }
}

function upload()
{
    $filename = $_FILES['profile-picture']['name'];
    $filesize = $_FILES['profile-picture']['size'];
    $tmpname = $_FILES['profile-picture']['tmp_name'];

    if (empty($filename)) {
        return 'customer.png';
    }

    $validImageExtensions = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $filename);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtensions)) {
        echo "<script>
                alert('Not an image.');
                </script>";
        return false;
    }

    if ($filesize > 3000000) {
        echo "<script>
                alert('Image is too large.Max 3mb');
                </script>";
        return false;
    }

    $newFilename = uniqid() . '.' . $imageExtension;

    move_uploaded_file($tmpname, 'assets/img/' . $newFilename);

    return $newFilename;
}

function login($data)
{
    global $conn;

    $username = htmlspecialchars($data["username"]);
    $password = $data["password"];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        return false;
    }

    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: public/index.php");
        }
        exit;
    }
}

function editProfile($data)
{
    global $conn;
    session_start();
    $id_user = $_SESSION['id'];

    // Sanitize and validate the input data
    $username = htmlspecialchars($data["username"]);
    $firstName = htmlspecialchars(ucwords($data["firstName"]));
    $lastName = htmlspecialchars(ucwords($data["lastName"]));
    $address = htmlspecialchars($data["address"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);

    // Check if the user provided a new profile picture
    $newProfilePicture = uploadProfilePicture();

    // Check if the password field is not empty (if the user wants to change the password)
    if (!empty($password)) {
        // Encrypt the new password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's information with the new password and profile picture
        $sql = "UPDATE users SET username = '$username', first_name = '$firstName', last_name = '$lastName', 
                full_address = '$address', password = '$password', profile_picture = '$newProfilePicture' 
                WHERE id = '$id_user'";

        echo "<script>alert('Success edit profile');</script>";
    } else {
        // Update the user's information without changing the password
        $sql = "UPDATE users SET username = '$username', first_name = '$firstName', last_name = '$lastName', 
                full_address = '$address', profile_picture = '$newProfilePicture' 
                WHERE id = '$id_user'";

        echo "<script>alert('Success edit profile');</script>";
    }

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "<script>alert('Failed to update profile.');</script>";
        return false;
    }
}

function uploadProfilePicture()
{
    // Check if a new profile picture is uploaded
    if (isset($_FILES['profilePhoto']) && !empty($_FILES['profilePhoto']['name'])) {
        $filename = $_FILES['profilePhoto']['name'];
        $filesize = $_FILES['profilePhoto']['size'];
        $tmpname = $_FILES['profilePhoto']['tmp_name'];

        // Validate and handle the uploaded profile picture
        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $filename);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "<script>alert('Not an image.');</script>";
            return ''; // Return an empty string to keep the current profile picture.
        }

        if ($filesize > 3000000) {
            echo "<script>alert('Image is too large. Max 3MB.');</script>";
            return ''; // Return an empty string to keep the current profile picture.
        }

        $newFilename = uniqid() . '.' . $imageExtension;

        move_uploaded_file($tmpname, '../assets/img/' . $newFilename);

        return $newFilename;
    } else {
        return ''; // Return an empty string if no new picture is uploaded.
    }
}
