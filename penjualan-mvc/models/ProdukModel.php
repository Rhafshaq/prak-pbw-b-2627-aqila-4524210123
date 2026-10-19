<?php
require_once __DIR__ . '/../koneksi.php';

class ProdukModel {
    private $db;

    public function __construct($koneksi) {
        $this->db = $koneksi;
    }

    public function getAll() {
        return mysqli_query(
            $this->db,
            "SELECT * FROM produk ORDER BY id DESC"
        );
    }

    public function getById($id) {
        $stmt = mysqli_prepare(
            $this->db,
            "SELECT * FROM produk WHERE id = ?"
        );
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $hasil = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($hasil);
    }

    public function tambah($nama, $harga, $stok) {
        $stmt = mysqli_prepare(
            $this->db,
            "INSERT INTO produk (nama_produk, harga, stok)
             VALUES (?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, "sdi", $nama, $harga, $stok);
        return mysqli_stmt_execute($stmt);
    }

    public function update($id, $nama, $harga, $stok) {
        $stmt = mysqli_prepare(
            $this->db,
            "UPDATE produk
             SET nama_produk = ?, harga = ?, stok = ?
             WHERE id = ?"
        );
        mysqli_stmt_bind_param(
            $stmt, "sdii", $nama, $harga, $stok, $id
        );
        return mysqli_stmt_execute($stmt);
    }

    public function hapus($id) {
        $stmt = mysqli_prepare(
            $this->db,
            "DELETE FROM produk WHERE id = ?"
        );
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
?>