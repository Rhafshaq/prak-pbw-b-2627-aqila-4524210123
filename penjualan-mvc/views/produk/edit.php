<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>

    <?php if (isset($error)) : ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST"
          action="index.php?action=edit&id=<?= $produk['id'] ?>">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk"
               value="<?= htmlspecialchars($produk['nama_produk']) ?>"
               required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" min="0" step="0.01"
               value="<?= $produk['harga'] ?>" required><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" min="0" step="1"
               value="<?= $produk['stok'] ?>" required><br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>