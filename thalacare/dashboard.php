<?php
include "db.php";
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['pages']) && $_GET['pages'] === 'donor' && isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM donor WHERE id=$id");
    header("Location: dashboard.php?pages=donor");
    exit();
}


// Hapus donasi
if (isset($_GET['pages']) && $_GET['pages'] === 'donasi' && isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM donasi WHERE id=$id");
    header("Location: dashboard.php?pages=donasi");
    exit();
}


$jumlah_donor = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM donor"))['total'];
$jumlah_donasi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM donasi"))['total'];
$jumlah_penderita = 34; // ganti kalau sudah ada tabel
$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Thalacare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fef7f5;
        }
        .sidebar {
            background-color: #7c0a02;
            height: 100vh;
            color: white;
            padding: 20px 15px;
            position: fixed;
            width: 220px;
            top: 56px;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            margin: 15px 0;
            font-size: 16px;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .content {
            margin-left: 220px;
            margin-top: 76px;
            padding: 30px;
        }
        .card-stat {
            border-radius: 12px;
            background: white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            padding: 25px;
        }
        .navbar {
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .navbar-brand {
            color: #7c0a02;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Thalacare Admin</a>
        <div class="d-flex ms-auto">
            <a href="logout.php" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="dashboard.php?page=donor"><i class="bi bi-person-hearts"></i> Data Donor</a>
    <a href="dashboard.php?page=donasi"><i class="bi bi-cash-coin"></i> Data Donasi</a>

</div>

<!-- Konten -->
<div class="content">
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page === 'donor') {
            include "pages/donor.php";
        } elseif ($page === 'donasi') {
            include "pages/donasi.php";
        } else {
            echo "<h2>Halaman tidak ditemukan.</h2>";
        }
    } else {
        // Default dashboard stats
        ?>
        <h2 class="mb-4">Selamat Datang, Admin 👋</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-stat">
                    <h5>Penderita Thalassemia</h5>
                    <h3><?= $jumlah_penderita ?></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-stat">
                    <h5>Jumlah Pendonor</h5>
                    <h3><?= $jumlah_donor ?></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-stat">
                    <h5>Jumlah Donasi</h5>
                    <h3><?= $jumlah_donasi ?></h3>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>


</body>
</html>
