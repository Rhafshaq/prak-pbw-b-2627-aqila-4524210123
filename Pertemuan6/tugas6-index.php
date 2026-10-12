
<?php
include "koneksi.php";

// Modifikasi 1: Pencarian berdasarkan NIM atau nama
$keyword = trim($_GET['cari'] ?? '');

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM mahasiswa
     WHERE nim LIKE ? OR nama LIKE ?"
);

$search = "%$keyword%";
mysqli_stmt_bind_param($stmt, "ss", $search, $search);
mysqli_stmt_execute($stmt);
$query = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Data Mahasiswa</title>
</head>
<body class="bg-gray-50 p-6 font-sans text-gray-800">
<div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Data Mahasiswa</h2>

    <a href="create.php"
       class="inline-block bg-blue-600 text-white px-4 py-2 rounded mb-4">
        + Tambah Mahasiswa
    </a>

    <form method="GET" class="mb-4 flex gap-2">
        <input type="text" name="cari"
               value="<?= htmlspecialchars($keyword) ?>"
               placeholder="Cari NIM atau nama..."
               class="border p-2 rounded flex-1">
        <button type="submit"
                class="bg-gray-700 text-white px-4 py-2 rounded">
            Cari
        </button>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200 text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-3">NIM</th>
                    <th class="border p-3">Nama</th>
                    <th class="border p-3">Email</th>
                    <th class="border p-3">Prodi</th>
                    <th class="border p-3">Angkatan</th>
                    <th class="border p-3">IPK</th>
                    <th class="border p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (mysqli_num_rows($query) > 0) { ?>
                <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr class="hover:bg-gray-50">
                    <td class="border p-3"><?= htmlspecialchars($data['nim']) ?></td>
                    <td class="border p-3"><?= htmlspecialchars($data['nama']) ?></td>
                    <td class="border p-3"><?= htmlspecialchars($data['email']) ?></td>
                    <td class="border p-3"><?= htmlspecialchars($data['prodi']) ?></td>
                    <td class="border p-3"><?= htmlspecialchars($data['angkatan']) ?></td>
                    <td class="border p-3"><?= htmlspecialchars($data['ipk']) ?></td>
                    <td class="border p-3">
                        <a class="text-blue-600"
                           href="edit.php?nim=<?= urlencode($data['nim']) ?>">
                            Edit
                        </a>
                        |
                        <a class="text-red-600"
                           href="delete.php?nim=<?= urlencode($data['nim']) ?>"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <!-- Modifikasi 2: Pesan jika data kosong -->
                <tr>
                    <td colspan="7" class="text-center p-4 text-gray-500">
                        Data mahasiswa tidak ditemukan.
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

<?php
mysqli_stmt_close($stmt);
?>