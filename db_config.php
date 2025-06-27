<?php
// db_config.php
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'cuaca');   // <-- GANTI DENGAN USERNAME DATABASE ANDA
define('DB_PASSWORD', '73Lr_6db7');       // <-- GANTI DENGAN PASSWORD DATABASE ANDA
define('DB_NAME', 'cuaca'); // Nama database yang Anda buat

// Buat koneksi
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Cek koneksi
if ($conn->connect_error) {
    // Untuk pengembangan, tampilkan error. Untuk produksi, log error saja.
    die("Connection failed: " . $conn->connect_error);
}
?>