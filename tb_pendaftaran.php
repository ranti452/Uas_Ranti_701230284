<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = getenv('DB_PASSWORD'); // Menggunakan variabel lingkungan untuk keamanan
$dbname = "db_seminar_online";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Definisi ENUM manual sesuai dengan perubahan
$metode_pembayaran_enum = ['Cash', 'Transfer', 'Gratis']; // Perbaiki 'geratis' menjadi 'gratis'
$status_enum = ['Terdaftar', 'Dikonfirmasi', 'Batal'];

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran</title>
    <style>
        form {
            width: 600px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);
            background-color: #f8d7da; /* Background form merah */
        }
        form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 4px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group a {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
            color: purple; /* Warna ungu */
            background-color: white; /* Background putih */
            padding: 10px;
            border: 1px solid purple;
            border-radius: 5px;
            text-decoration: none;
        }
        .form-group a:hover {
            color: darkviolet; /* Warna lebih gelap saat hover */
            background-color: #f8f9fa; /* Background lebih terang saat hover */
        }
    </style>
</head>
<body>
    <form action="simpan_seminar.php" method="post" enctype="multipart/form-data">
        <h2>Form Pendaftaran</h2>

        <div class="form-group">
            <label for="id_pendaftaran">ID Pendaftaran:</label>
            <input type="text" id="id_pendaftaran" name="id_pendaftaran" required>
        </div>

        <div class="form-group">
            <label for="id_peserta">ID Peserta:</label>
            <textarea id="id_peserta" name="id_peserta" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="id_seminar">ID Seminar:</label>
            <input type="text" id="id_seminar" name="id_seminar" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <?php foreach ($status_enum as $status): ?>
                    <option value="<?= $status ?>"><?= ucfirst($status) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_daftar">Tanggal Daftar:</label>
            <input type="date" id="tanggal_daftar" name="tanggal_daftar" required>
        </div>

        <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" required>
                <?php foreach ($metode_pembayaran_enum as $metode): ?>
                    <option value="<?= $metode ?>"><?= ucfirst($metode) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah_bayar">Jumlah Bayar:</label>
            <input type="number" id="jumlah_bayar" name="jumlah_bayar" required>
        </div>

        <div class="form-group">
            <label for="bukti_pembayaran">Bukti Pembayaran:</label>
            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" required>
        </div>

        <div class="form-group">
            <label for="catatan">Catatan:</label>
            <input type="text" id="catatan" name="catatan">
        </div>

        <!-- Tombol simpan menjadi tombol submit yang benar -->
        <div class="form-group">
            <input type="submit" name="submit" value="Simpan">
        </div>
    </form>
</body>
</html>