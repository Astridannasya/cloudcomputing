<?php
include __DIR__ . '/../db.php';


// Hapus donor
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM donor WHERE id=$id");
    header("Location: ../dashboard.php?pages=donor");
exit();

}

// Ambil data
$data = mysqli_query($koneksi, "SELECT * FROM donor");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Donor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Data Donor</h2>
    <a href="tambah_donor.php" class="btn btn-primary mb-3">+ Tambah Donor</a>
    <table class="table table-bordered table-striped bg-white">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Usia</th>
                <th>Golongan</th>
                <th>Tanggal</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['usia'] ?></td>
                <td><?= $row['golongan_darah'] ?></td>
                <td><?= $row['tanggal_donor'] ?></td>
                <td><?= $row['catatan'] ?></td>
                <td>
                   <a href="dashboard.php?pages=donor&hapus=<?= $row['id'] ?>"
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
