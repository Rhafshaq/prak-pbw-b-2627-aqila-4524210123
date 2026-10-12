
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $prodi = trim($_POST['prodi'] ?? '');
    $angkatan = $_POST['angkatan'] ?? '';
    $ipk = $_POST['ipk'] ?? '';

    // Modifikasi 1: Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Format email tidak valid.");
    }

    // Modifikasi 2: Prepared statement
    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO mahasiswa
        (nim, nama, email, prodi, angkatan, ipk)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        exit("Query gagal disiapkan.");
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssssd",
        $nim,
        $nama,
        $email,
        $prodi,
        $angkatan,
        $ipk
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('Data mahasiswa berhasil disimpan');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal disimpan');
            window.history.back();
        </script>";
    }

    mysqli_stmt_close($stmt);
}
?>