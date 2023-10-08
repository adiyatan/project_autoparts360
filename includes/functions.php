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

    $gambar = upload();
    if (!$gambar) {
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
    $sql = "INSERT INTO users (first_name, last_name, province, city, zip, full_address, username, password) 
            VALUES ('$firstName', '$lastName', '$province', '$city', '$zip', '$fullAddress', '$username', '$password')";

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
    $namafile = $_FILES['profile-picture']['name'];
    $ukuranfile = $_FILES['profile-picture']['size'];
    $tmpname = $_FILES['profile-picture']['tmp_name'];

    //cek apakah ekstensi itu gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('bukan gambar');
                </script>";
        return false;
    }

    //ukuran data
    if ($ukuranfile > 3000000) {
        echo "<script>
                alert('gambar kebesaran');
                </script>";
        return false;
    }

    //generate
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lolos
    move_uploaded_file("$tmpname", 'img/' . $namaFileBaru);

    return $namaFileBaru;
}
