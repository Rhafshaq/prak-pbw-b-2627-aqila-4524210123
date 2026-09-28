<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga,
        protected int $stok
    ) {}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    // MODIFIKASI 1:
    // Menambahkan field stok dan method untuk mengambil stok
    public function getStok(): int
    {
        return $this->stok;
    }

    // MODIFIKASI 2:
    // Menambahkan kondisi status stok
    public function statusStok(): string
    {
        if ($this->stok <= 0) {
            return 'Habis';
        }

        if ($this->stok <= 5) {
            return 'Stok Menipis';
        }

        return 'Tersedia';
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(
        string $nama,
        float $harga,
        int $stok,
        private float $diskon
    ) {
        parent::__construct($nama, $harga, $stok);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

$daftar = [
    new Produk('Keyboard', 250000, 10),
    new ProdukDiskon('Mouse', 150000, 4, 10),
    new Produk('Monitor', 1500000, 0)
];

foreach ($daftar as $produk) {
    echo 'Nama Produk: ' . $produk->getNama() . '<br>';
    echo 'Harga: Rp ' . number_format(
        $produk->hargaAkhir(),
        0,
        ',',
        '.'
    ) . '<br>';

    echo 'Stok: ' . $produk->getStok() . '<br>';
    echo 'Status: ' . $produk->statusStok() . '<br>';
    echo '<hr>';
}