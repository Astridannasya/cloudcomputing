<?php
include "db.php";

// Tambah donasi
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];
    $pesan = $_POST['pesan'];

    mysqli_query($koneksi, "INSERT INTO donasi (nama, email, nominal, metode_pembayaran, pesan)
                            VALUES ('$nama', '$email', '$nominal', '$metode', '$pesan')");
    header("Location: /thalacare/dashboard.php?page=donasi");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4">Form Tambah Donasi</h2>
        <form method="POST" class="bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nominal (Rp)</label>
                <input type="number" name="nominal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Metode Pembayaran</label>
                <select name="metode" class="form-select" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="OVO">OVO</option>
                    <option value="GoPay">GoPay</option>
                    <option value="DANA">DANA</option>
                    <option value="ShopeePay">ShopeePay</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pesan</label>
                <textarea name="pesan" class="form-control"></textarea>
            </div>
            <button type="submit" name="kirim" class="btn btn-success">Kirim</button>
            <a href="donasi.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>