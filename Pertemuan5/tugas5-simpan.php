<?php
include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];

// Modifikasi 1: Validasi IPK
if (!is_numeric($ipk) || $ipk < 0 || $ipk > 4) {
    exit("IPK harus berada antara 0 sampai 4.");
}

// Modifikasi 2: Prepared statement
$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, prodi, angkatan, ipk)
    VALUES (?, ?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssss id",
    $nim,
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk
);

if (mysqli_stmt_execute($stmt)) {
    echo "Data berhasil disimpan.";
} else {
    echo "Data gagal disimpan.";
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>