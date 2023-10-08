<?php
require 'includes/functions.php';

$message = '';
if (isset($_POST["submit"])) {
    $result = login($_POST);
    if (!$result) {
        $message = '<div class="alert alert-danger">Failed to Login!</div>';
    }
}

if (isset($_GET['message']) && $_GET['message'] === 'success') {
    $message = '<div class="alert alert-success">Successful register! Please login.</div>';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - AutoParts360</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            /* Ganti warna background dengan gradasi */
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        .login-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            /* Ubah border-radius menjadi 20px */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            /* Tambahkan efek bayangan yang lebih lembut */
            max-width: 400px;
            width: 100%;
            animation: fadeInDown 1s ease;
        }

        .login-form h2 {
            color: #333;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .form-group label {
            color: #333;
            font-weight: 500;
        }

        .login-btn {
            background-color: #0047ab;
            color: #fff;
            padding: 14px 24px;
            /* Tambahkan padding agar tombol lebih besar */
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .login-btn:hover {
            background-color: #3367d6;
            animation: heartbeat 0.7s ease infinite;
        }

        .login-google {
            background-color: #0047ab;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .login-google:hover {
            background-color: #3367d6;
        }

        .text-center a {
            color: #333;
            font-weight: 600;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes heartbeat {
            from {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            to {
                transform: scale(1);
            }
        }

        .header {
            color: #0047ab;
            font-size: 48px;
            /* Ubah ukuran font menjadi lebih besar */
            font-weight: 700;
            margin-bottom: 40px;
            /* Tambahkan margin agar jarak lebih besar */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            /* Efek bayangan teks */
        }

        .text-center a {
            color: #0047ab;
            font-weight: 600;
            text-decoration: none;
        }

        .text-center a:hover {
            color: #3367d6;
        }

        /* Mengubah warna tombol lupa password menjadi #0047ab */
        .forgot-password {
            text-align: right;
            color: #0047ab;
        }

        @media (max-width: 768px) {
            .login-form {
                padding: 20px;
            }

            .header {
                font-size: 32px;
            }

            .login-btn {
                padding: 10px 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="header">AutoParts360</h1>
        <div class="login-form">
            <h2 class="text-center">Login</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group forgot-password">
                    <a href="#">Forgot Password</a>
                </div>
                <?php echo $message; ?>
                <div class="form-group text-center">
                    <button type="submit" class="login-btn" name="submit">Login</button>
                </div>
            </form>
            <div class="text-center">
                <p>Don't have an account yet? <a href="regist.php">Register</a></p>
                <p>OR</p>
                <p>Request login as admin <a href="about/index.php#contact-section">form</a></p>
            </div>
        </div>
    </div>
</body>

</html>