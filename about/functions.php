<?php
//koneksi
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

function tambah($data)
{
    global $conn;
    
    // Ambil data
    $nama = htmlspecialchars($data['fullName']);
    $email = htmlspecialchars($data['email']);
    $pesan = htmlspecialchars($data['message']);
    $created_at = date('Y-m-d H:i:s');

    // Query
    $query = "INSERT INTO contacts (fullName, email, message, created_at) VALUES ('$nama', '$email', '$pesan', '$created_at')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>


