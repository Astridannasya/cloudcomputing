<?php
include __DIR__ . '/../db.php';


// Hapus donasi
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM donasi WHERE id=$id");
    header("Location: ../dashboard.php");

}

// Ambil data
$data = mysqli_query($koneksi, "SELECT * FROM donasi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Data Donasi</h2>
    <a href="tambah_donasi.php" class="btn btn-primary mb-3">+ Tambah Donasi</a>
    <table class="table table-bordered table-striped bg-white">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Nominal</th>
                <th>Metode Pembayaran</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>Rp <?= number_format($row['nominal'], 0, ',', '.') ?></td>
                <td><?= $row['metode_pembayaran'] ?></td>
                <td><?= $row['pesan'] ?></td>
                <td>
                   <a href="dashboard.php?pages=donasi&hapus=<?= $row['id'] ?>"
 class="btn btn-sm btn-danger"
   onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
