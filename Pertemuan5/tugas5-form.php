<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Mahasiswa</title>

    <!-- Modifikasi 1: Styling CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f5f9;
            padding: 30px;
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 8px;
            margin: 8px 0;
        }

        button {
            padding: 10px;
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<form action="simpan.php" method="post">
    <h2>Form Data Mahasiswa</h2>

    NIM:
    <input type="text" name="nim" required>
    <br><br>

    Nama:
    <input type="text" name="nama" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    Prodi:
    <input type="text" name="prodi" required>
    <br><br>

    Angkatan:
    <input type="number" name="angkatan" required>
    <br><br>

    IPK:
    <!-- Modifikasi 2: Batas nilai IPK -->
    <input type="number" name="ipk"
           min="0" max="4" step="0.01" required>
    <br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>