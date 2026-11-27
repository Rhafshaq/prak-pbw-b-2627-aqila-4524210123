<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Mahasiswa</h4>
        </div>

        <div class="card-body">

            <!-- Menampilkan pesan kesalahan validasi -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('mahasiswa/simpan') ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim"
                        class="form-control"
                        value="<?= old('nim') ?>"
                        placeholder="Masukkan NIM">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama"
                        class="form-control"
                        value="<?= old('nama') ?>"
                        placeholder="Masukkan nama mahasiswa">
                </div>

                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="prodi"
                        class="form-control"
                        value="<?= old('prodi') ?>"
                        placeholder="Masukkan program studi">
                </div>

                <div class="mb-3">
                    <label class="form-label">IPK</label>
                    <input type="number" name="ipk"
                        class="form-control"
                        value="<?= old('ipk') ?>"
                        step="0.01"
                        min="0"
                        max="4"
                        placeholder="Contoh: 3.75">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="<?= base_url('mahasiswa') ?>"
                    class="btn btn-secondary">
                    Kembali
                </a>

            </form>
        </div>
    </div>
</div>

</body>
</html>