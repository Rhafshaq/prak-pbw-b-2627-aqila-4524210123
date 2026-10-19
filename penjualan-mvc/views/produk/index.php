<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Daftar Produk</h2>

    <a href="index.php?action=create">Tambah Produk</a>

    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 0; ?>

        <?php while ($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?= ++$no ?></td>

            <td>
                <?= htmlspecialchars($row['nama_produk']) ?>
            </td>

            <td>
                Rp <?= number_format($row['harga'], 0, ',', '.') ?>
            </td>

            <td><?= $row['stok'] ?></td>

            <td>
                <a href="index.php?action=edit&id=<?= $row['id'] ?>">Edit</a>
                |
                <a href="index.php?action=hapus&id=<?= $row['id'] ?>"
                   onclick="return confirm('Hapus produk ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>