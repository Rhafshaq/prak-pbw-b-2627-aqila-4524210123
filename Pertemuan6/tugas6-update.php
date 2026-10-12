
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Metode akses tidak valid.");
}

$nim = $_POST['nim'] ?? '';
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$angkatan = $_POST['angkatan'] ?? '';
$ipk = $_POST['ipk'] ?? '';

// Modifikasi 1: Validasi IPK
if (!is_numeric($ipk) || $ipk < 0 || $ipk > 4) {
    exit("IPK harus berada antara 0 sampai 4.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Format email tidak valid.");
}

// Modifikasi 2: Prepared statement untuk update
$stmt = mysqli_prepare(
    $koneksi,
    "UPDATE mahasiswa
     SET nama = ?, email = ?, prodi = ?,
         angkatan = ?, ipk = ?
     WHERE nim = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssssds",
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk,
    $nim
);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('Data mahasiswa berhasil diubah');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal diubah');
        window.history.back();
    </script>";
}

mysqli_stmt_close($stmt);
?>
