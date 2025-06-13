<?php
include "db.php";

// Tambah donor
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $gol = $_POST['gol'];
    $tgl = $_POST['tanggal'];
    $catatan = $_POST['catatan'];

    mysqli_query($koneksi, "INSERT INTO donor (nama, usia, golongan_darah, tanggal_donor, catatan)
                            VALUES ('$nama', '$usia', '$gol', '$tgl', '$catatan')");
    header("Location: /thalacare/dashboard.php?page=donor");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Donor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Form Tambah Donor</h2>
    <form method="POST" class="bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Usia</label>
            <input type="number" name="usia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Golongan Darah</label>
            <input type="text" name="gol" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Donor</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>
        <button type="submit" name="tambah" class="btn btn-success">Simpan</button>
        <a href="donor.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
