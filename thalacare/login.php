<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['login'] = true;
        header("Location: dashboard.php");
    } else {
        echo "Login gagal. Coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Thalacare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #fef7f5;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 16px;
            background: white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .btn-maroon {
            background-color: #7c0a02;
            color: #fff;
        }
        .btn-maroon:hover {
            background-color: #5e0700;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center mb-4">Login</h3>
        
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-maroon w-100">Login</button>
        </form>
    </div>
</body>
</html>