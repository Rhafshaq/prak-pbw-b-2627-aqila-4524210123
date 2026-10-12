# Praktikum Pemrograman Berbasis Web - Tugas Pertemuan 5

## 1. Deskripsi
Program ini merupakan aplikasi sederhana untuk mengelola data mahasiswa menggunakan PHP dan MySQL. Program terdiri dari file koneksi database, pengambilan data, form input, dan penyimpanan data.

## 2. Struktur File
- `koneksi.php`: Menghubungkan program dengan database MySQL.
- `data.php`: Mengambil dan menampilkan data mahasiswa.
- `form.php`: Menampilkan form input data mahasiswa.
- `simpan.php`: Memvalidasi dan menyimpan data mahasiswa.

## 3. Modifikasi yang Dilakukan

### A. File form.php
1. Menambahkan styling CSS agar tampilan form lebih rapi.
2. Menambahkan batas nilai IPK dari 0 sampai 4.

### B. File simpan.php
1. Menambahkan validasi IPK agar hanya menerima angka dari 0 sampai 4.
2. Menggunakan prepared statement untuk meningkatkan keamanan query SQL.

## 4. Penjelasan Lima Bagian Kode
1. `mysqli_connect()` pada `koneksi.php` digunakan untuk menghubungkan PHP dengan database.
2. `SELECT * FROM mahasiswa` pada `data.php` digunakan untuk mengambil data mahasiswa.
3. Input IPK pada `form.php` dibatasi menggunakan atribut `min`, `max`, dan `step`.
4. Validasi pada `simpan.php` digunakan untuk memastikan IPK berada dalam rentang 0–4.
5. `mysqli_prepare()` pada `simpan.php` digunakan untuk menyiapkan query SQL dengan parameter.

## 5. Error dan Perbaikan
Error yang dibahas adalah `Unknown database 'akademik'`. Penyebabnya adalah database belum tersedia atau nama database tidak sesuai. Perbaikannya dilakukan dengan memeriksa database melalui phpMyAdmin dan memastikan nama database pada file koneksi sudah benar.

## 6. Screenshot
- Screenshot sebelum modifikasi form.
- Screenshot sesudah modifikasi form.
- Screenshot hasil penyimpanan data.
- Screenshot data mahasiswa di phpMyAdmin.

## 7. Kesimpulan
Melalui tugas ini, saya mempelajari cara memodifikasi form PHP, melakukan validasi IPK, menggunakan prepared statement, dan menghubungkan program PHP dengan database MySQL.
