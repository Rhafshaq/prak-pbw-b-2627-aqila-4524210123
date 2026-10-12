
<?php
include "koneksi.php";

// Modifikasi 1: Memeriksa parameter NIM
if (!isset($_GET['nim']) || $_GET['nim'] === '') {
    exit("NIM tidak ditemukan.");
}

$nim = $_GET['nim'];

// Modifikasi 2: Prepared statement untuk menghapus data
$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($stmt, "s", $nim);

if (mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>
            alert('Data mahasiswa berhasil dihapus');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data mahasiswa tidak ditemukan');
            window.location.href = 'index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Data gagal dihapus');
        window.history.back();
    </script>";
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
