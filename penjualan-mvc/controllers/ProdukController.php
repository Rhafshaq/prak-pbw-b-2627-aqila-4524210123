<?php
require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController {
    private $model;

    public function __construct($koneksi) {
        $this->model = new ProdukModel($koneksi);
    }

    public function index() {
        return $this->model->getAll();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = trim($_POST['nama_produk'] ?? '');
            $harga = $_POST['harga'] ?? '';
            $stok = $_POST['stok'] ?? '';

            if ($nama !== '' && is_numeric($harga)
                && $harga >= 0 && filter_var(
                    $stok,
                    FILTER_VALIDATE_INT
                ) !== false && $stok >= 0) {
                if ($this->model->tambah($nama, $harga, $stok)) {
                    header("Location: index.php");
                    exit;
                }
                $error = "Gagal menyimpan produk.";
            } else {
                $error = "Masukkan data produk dengan benar.";
            }
        }

        require __DIR__ . '/../views/produk/create.php';
    }

    public function edit() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $produk = $id ? $this->model->getById($id) : null;

        if (!$produk) {
            header("Location: index.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = trim($_POST['nama_produk'] ?? '');
            $harga = $_POST['harga'] ?? '';
            $stok = $_POST['stok'] ?? '';

            if ($nama !== '' && is_numeric($harga)
                && $harga >= 0 && filter_var(
                    $stok,
                    FILTER_VALIDATE_INT
                ) !== false && $stok >= 0) {
                if ($this->model->update(
                    $id, $nama, $harga, $stok
                )) {
                    header("Location: index.php");
                    exit;
                }
                $error = "Gagal mengubah produk.";
            } else {
                $error = "Masukkan data produk dengan benar.";
            }
        }

        require __DIR__ . '/../views/produk/edit.php';
    }

    public function hapus() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $this->model->hapus($id);
        }

        header("Location: index.php");
        exit;
    }
}
?>