<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';

$koneksi = mysqli_connect($host, $user, $pass);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi ke server MySQL berhasil!\n";
?>