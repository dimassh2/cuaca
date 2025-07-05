# Weather Station Berbasis IoT dengan Rekomendasi AI

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

![Tampilan Dasbor](https://raw.githubusercontent.com/dimassh2/cuaca/main/path/to/your/dashboard_screenshot.png) 
*(Gantilah URL di atas dengan link ke gambar dasbor Anda setelah Anda mengunggahnya ke repositori)*

## Deskripsi Proyek

[cite_start]Sistem pemantauan cuaca berbasis Internet of Things (IoT) yang berfungsi untuk mengumpulkan, menyimpan, dan menyajikan data cuaca secara real-time melalui dasbor web interaktif[cite: 53, 54]. [cite_start]Keunggulan utama proyek ini adalah integrasi dengan Google Gemini AI untuk mengubah data cuaca mentah menjadi wawasan yang dapat ditindaklanjuti, seperti rekomendasi aktivitas, pakaian, hingga kuliner yang dipersonalisasi[cite: 57, 58].

## Fitur Utama

-   📊 **Dasbor Real-time:** Visualisasi data suhu, kelembapan, tekanan, dan ketinggian secara langsung.
-   💧 **Deteksi Hujan:** Sensor hujan yang memicu notifikasi audio (buzzer) pada perangkat.
-   🤖 **Saran AI Cerdas:** Rekomendasi aktivitas, pakaian, dan kuliner dari Google Gemini AI berdasarkan kondisi cuaca aktual.
-   📈 **Grafik Historis:** Grafik interaktif untuk melihat tren data cuaca dari waktu ke waktu.
-   📱 **Tampilan Responsif:** Dasbor dapat diakses dengan baik di berbagai perangkat.

## Teknologi yang Digunakan

**Perangkat Keras:**
* ESP32
* Sensor DHT11
* Sensor BMP280
* Raindrop Sensor
* LCD 16x2 I2C
* Buzzer

**Perangkat Lunak:**
* **Firmware:** C++ (Arduino)
* **Backend:** PHP
* **Database:** MySQL
* **Frontend:** HTML, CSS, JavaScript (dengan Chart.js)
* **API:** Google Gemini API

## Instalasi & Penggunaan

### 1. Perangkat Keras
- Rakit semua komponen sesuai dengan diagram rangkaian yang ada di folder `wearing`.
- Upload kode firmware (dari laporan Anda) ke ESP32 menggunakan Arduino IDE. Pastikan semua library yang dibutuhkan sudah terinstal.

### 2. Backend (Server)
- Siapkan web server dengan PHP dan database MySQL.
- Impor struktur database dari file `.sql` (jika ada) atau buat manual.
- [cite_start]Konfigurasi koneksi database di file `db_config.php`[cite: 184, 185].
- Upload semua file PHP ke direktori server Anda.

### 3. Frontend
- Buka file `index.html` di browser untuk melihat dasbor.
- Pastikan endpoint API di file `app.js` sudah mengarah ke alamat server Anda.

## Demo Proyek

Berikut adalah beberapa tangkapan layar dari proyek yang sedang berjalan.

**Tampilan Dasbor saat Hujan:**
![Tampilan Dasbor](https://raw.githubusercontent.com/dimassh2/cuaca/main/path/to/your/dashboard_screenshot.png)

**Rekomendasi dari AI:**
![Saran AI](https://raw.githubusercontent.com/dimassh2/cuaca/main/path/to/your/ai_recommendation.png)

**Perangkat Keras:**
![Alat](https://raw.githubusercontent.com/dimassh2/cuaca/main/path/to/your/hardware_photo.png)

