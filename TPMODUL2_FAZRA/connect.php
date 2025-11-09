<?php
// ============1===========
// Definisikan variabel-variabel yang akan digunakan untuk melakukan koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db_tp_modul2';
$port = 3308;

// ===========2============
// Lakukan koneksi ke database menggunakan mysqli_connect
$conn = mysqli_connect($host, $username, $password, $db, $port);

// Periksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // Set karakter set ke utf8mb4 jika koneksi berhasil
    mysqli_set_charset($conn, 'utf8mb4');
}
?>
