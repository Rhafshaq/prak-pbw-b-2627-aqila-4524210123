# Praktikum Pemrograman Berbasis Web - Pertemuan 4

Repository ini berisi hasil praktikum Pemrograman Berbasis Web Pertemuan 4 yang terdiri dari Tugas 1 dan Tugas 2 menggunakan PHP dan MySQL.

## Identitas

|                   |                              |
| ----------------- | ---------------------------- |
| **Nama**          | Raudha Hafsha Aqila          |
| **NPM**           | 4524210123                   |
| **Program Studi** | Teknik Informatika           |
| **Mata Kuliah**   | Pemrograman Berbasis Web - B |

## Teknologi yang Digunakan

* PHP
* MySQL
* XAMPP
* Visual Studio Code
* Git & GitHub

---

# Tugas 1

Tugas 1 merupakan program PHP yang menggunakan database MySQL untuk melakukan proses **INSERT** dan **SELECT** data mahasiswa.

Program memasukkan beberapa data mahasiswa ke dalam tabel `mahasiswa`, kemudian menampilkan mahasiswa yang memiliki IPK minimal 3.50.

## Modifikasi yang Dilakukan

**1. Menambahkan kondisi berdasarkan program studi**

Pada query SELECT ditambahkan kondisi:

```sql
AND prodi = 'Teknik Informatika'
```

Modifikasi ini digunakan agar program hanya menampilkan mahasiswa dari Program Studi Teknik Informatika yang memiliki IPK minimal 3.50.

**2. Menambahkan status berdasarkan IPK**

Program ditambahkan kondisi untuk menentukan status mahasiswa:

```php
if ($row['ipk'] >= 3.75) {
    $status = "Sangat Baik";
} else {
    $status = "Baik";
}
```

Dengan modifikasi ini, hasil query tidak hanya menampilkan data mahasiswa, tetapi juga menampilkan status berdasarkan nilai IPK.

## Lima Bagian Kode Penting Tugas 1

### 1. Koneksi Database

```php
require_once 'koneksi.php';
```

Digunakan untuk menghubungkan program PHP dengan database melalui file `koneksi.php`.

### 2. Proses INSERT

```php
$sqlInsert = "INSERT IGNORE INTO mahasiswa ...";
```

Digunakan untuk memasukkan data mahasiswa ke dalam tabel `mahasiswa`.

### 3. Kondisi SELECT

```sql
WHERE ipk >= 3.50
AND prodi = 'Teknik Informatika'
```

Digunakan untuk menyaring data mahasiswa berdasarkan IPK dan program studi.

### 4. Penentuan Status IPK

```php
if ($row['ipk'] >= 3.75) {
    $status = "Sangat Baik";
} else {
    $status = "Baik";
}
```

Digunakan untuk memberikan status berdasarkan nilai IPK mahasiswa.

### 5. ORDER BY dan LIMIT

```sql
ORDER BY ipk DESC, nama ASC
LIMIT 10
```

Digunakan untuk mengurutkan mahasiswa berdasarkan IPK tertinggi dan nama, serta membatasi jumlah data yang ditampilkan.

## Screenshot Tugas 1

### Sebelum Modifikasi

Masukkan screenshot hasil program sebelum dilakukan modifikasi.

**File screenshot:**

```text
tugas4(1)-sebelum.png
```

### Sesudah Modifikasi

Masukkan screenshot hasil program setelah dilakukan modifikasi.

**File screenshot:**

```text
tugas4(1)-sesudah.png
```

---

# Tugas 2

Tugas 2 merupakan program PHP yang menggunakan database MySQL untuk melakukan beberapa operasi terhadap data mahasiswa, yaitu **UPDATE, SELECT, GROUP BY, dan DELETE**.

Program melakukan perubahan data IPK, menampilkan rekap mahasiswa berdasarkan program studi, melakukan verifikasi data sebelum penghapusan, kemudian menghapus data mahasiswa tertentu.

## Modifikasi yang Dilakukan

**1. Menambahkan proses INSERT data mahasiswa baru**

Ditambahkan proses untuk memasukkan mahasiswa baru:

```php
$sqlInsert = "INSERT INTO mahasiswa (nim, nama, prodi, ipk)
              VALUES ('2025005', 'Budi Santoso', 'Sistem Informasi', 3.75)";
```

Modifikasi ini digunakan untuk menambahkan data mahasiswa baru ke dalam database.

**2. Menambahkan fitur menampilkan mahasiswa dengan IPK tertinggi**

Ditambahkan query:

```php
$sqlTertinggi = "SELECT nim, nama, prodi, ipk
                 FROM mahasiswa
                 ORDER BY ipk DESC
                 LIMIT 1";
```

Modifikasi ini digunakan untuk mencari dan menampilkan satu mahasiswa yang memiliki IPK paling tinggi.

## Lima Bagian Kode Penting Tugas 2

### 1. Proses INSERT

```php
$sqlInsert = "INSERT INTO mahasiswa (nim, nama, prodi, ipk)
              VALUES ('2025005', 'Budi Santoso', 'Sistem Informasi', 3.75)";
```

Digunakan untuk menambahkan data mahasiswa baru ke database.

### 2. Proses UPDATE

```php
$sqlUpdate = "UPDATE mahasiswa SET ipk = 3.40
              WHERE nim = '2025003'";
```

Digunakan untuk mengubah nilai IPK mahasiswa berdasarkan NIM.

### 3. GROUP BY dan AVG

```sql
SELECT prodi, COUNT(*) AS jumlah,
ROUND(AVG(ipk),2) AS rata_ipk
FROM mahasiswa
GROUP BY prodi
ORDER BY jumlah DESC
```

Digunakan untuk menghitung jumlah mahasiswa dan rata-rata IPK pada setiap program studi.

### 4. Verifikasi Data Sebelum DELETE

```php
$sqlVerifikasi = "SELECT * FROM mahasiswa
                  WHERE nim = '2025003'";
```

Digunakan untuk memastikan bahwa data mahasiswa yang akan dihapus benar-benar tersedia di database.

### 5. Menampilkan IPK Tertinggi

```php
$sqlTertinggi = "SELECT nim, nama, prodi, ipk
                 FROM mahasiswa
                 ORDER BY ipk DESC
                 LIMIT 1";
```

Digunakan untuk mencari satu mahasiswa dengan nilai IPK tertinggi.

## Screenshot Tugas 2

### Sebelum Modifikasi

Masukkan screenshot hasil program sebelum dilakukan modifikasi.

**File screenshot:**

```text
![Tugas 3 Sebelum Modifikasi](screenshots/tugas4(1)-sebelum.png)
```

### Sesudah Modifikasi

Masukkan screenshot hasil program setelah dilakukan modifikasi.

**File screenshot:**

```text
![Tugas 3 Sebelum Modifikasi](screenshots/tugas4(1)-sesudah.png)
```

---

# Error yang Pernah Muncul

### Error: `Could not open input file: tugas4`

Error muncul ketika menjalankan file PHP dengan nama yang mengandung tanda kurung, yaitu `tugas4(1).php`.

Perintah yang menyebabkan error:

```powershell
& "C:\xampp\php\php.exe" tugas4(1).php
```

Penyebabnya adalah nama file tidak ditulis sebagai satu nama file secara utuh.

### Perbaikan

Nama file ditulis menggunakan tanda petik:

```powershell
& "C:\xampp\php\php.exe" "tugas4(1).php"
```

Setelah nama file diberi tanda petik, program dapat dijalankan dengan benar.

---

# Kesimpulan

Pada praktikum Pemrograman Berbasis Web Pertemuan 3, telah dilakukan implementasi program PHP yang terhubung dengan database MySQL.

Tugas 1 membahas proses **INSERT dan SELECT** data mahasiswa dengan penambahan kondisi berdasarkan program studi dan status berdasarkan IPK.

Tugas 2 membahas proses **INSERT, UPDATE, SELECT, GROUP BY, dan DELETE**, serta ditambahkan fitur untuk memasukkan data mahasiswa baru dan menampilkan mahasiswa dengan IPK tertinggi.

Melalui praktikum ini, dapat dipahami penggunaan PHP untuk mengelola data pada database MySQL serta cara melakukan modifikasi program sesuai kebutuhan.
