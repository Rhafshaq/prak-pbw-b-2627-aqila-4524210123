<?php
/**
 * @var array $mahasiswa
 * @var \CodeIgniter\Validation\Validation|null $validation
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">

        <div class="card-header bg-warning">
            <h4 class="mb-0">Ubah Data Mahasiswa</h4>
        </div>

        <div class="card-body">

            <!-- Pesan kesalahan validasi -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('mahasiswa/update/' . $mahasiswa['id']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim"
                        class="form-control"
                        value="<?= old('nim', $mahasiswa['nim']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama"
                        class="form-control"
                        value="<?= old('nama', $mahasiswa['nama']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="prodi"
                        class="form-control"
                        value="<?= old('prodi', $mahasiswa['prodi']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">IPK</label>
                    <input type="number" name="ipk"
                        class="form-control"
                        step="0.01"
                        min="0"
                        max="4"
                        value="<?= old('ipk', $mahasiswa['ipk']) ?>">
                </div>

                <button type="submit" class="btn btn-warning">
                    Perbarui Data
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