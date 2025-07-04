<?php
// receive_data.php -- VERSI DENGAN ZONA WAKTU WITA

// ======================================================================
// AKTIFKAN ERROR REPORTING PHP SECARA PAKSA UNTUK DEBUGGING
// ======================================================================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ======================================================================
// HEADER DAN PENGATURAN CORS
// ======================================================================
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// ======================================================================
// KONEKSI DATABASE
// ======================================================================
require_once 'db_config.php';

if (!$conn || $conn->connect_error) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Koneksi ke database gagal: ' . ($conn ? $conn->connect_error : 'Variabel koneksi tidak ada.')]);
    exit();
}

// ======================================================================
// PROSES DATA MASUK
// ======================================================================
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

if (json_last_error() !== JSON_ERROR_NONE || empty($data)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Data tidak diterima atau format JSON tidak valid.', 'received_data' => $json_data]);
    $conn->close();
    exit();
}

// **PERUBAHAN ZONA WAKTU:**
// Mengatur zona waktu default untuk skrip ini ke Waktu Indonesia Tengah (WITA).
date_default_timezone_set('Asia/Makassar');

// Ambil nilai dari data
$temperature = isset($data['temperature']) ? floatval($data['temperature']) : 0.0;
$humidity = isset($data['humidity']) ? floatval($data['humidity']) : 0.0;
$pressure = isset($data['pressure']) ? floatval($data['pressure']) : 0.0;
$altitude = isset($data['altitude']) ? floatval($data['altitude']) : 0.0;
$is_raining = isset($data['isRaining']) ? ($data['isRaining'] ? 1 : 0) : 0;
$condition = isset($data['condition']) ? $conn->real_escape_string($data['condition']) : 'UNKNOWN';
// Timestamp sekarang akan menggunakan zona waktu WITA
$timestamp = date('Y-m-d H:i:s');

// ======================================================================
// EKSEKUSI SQL
// ======================================================================
$stmt = $conn->prepare("INSERT INTO sensor_data (timestamp, temperature, humidity, pressure, altitude, is_raining, `condition`) VALUES (?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Gagal menyiapkan statement SQL: ' . $conn->error]);
    $conn->close();
    exit();
}

$stmt->bind_param("sddddis", $timestamp, $temperature, $humidity, $pressure, $altitude, $is_raining, $condition);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan dengan ID: ' . $stmt->insert_id]);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Gagal mengeksekusi statement: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
