<?php
$koneksi = new mysqli("localhost", "root", "", "thalacare");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
