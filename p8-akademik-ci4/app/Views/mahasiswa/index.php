<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Mahasiswa</h4>

            <a href="<?= base_url('mahasiswa/tambah') ?>"
                class="btn btn-light btn-sm">
                + Tambah Mahasiswa
            </a>
        </div>

        <div class="card-body">

            <!-- Pesan berhasil -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>IPK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($mahasiswa)): ?>

                            <?php $no = 1; ?>

                            <?php foreach ($mahasiswa as $mhs): ?>

                                <tr>
                                    <td><?= $no++ ?></td>

                                    <td><?= esc($mhs['nim']) ?></td>

                                    <td><?= esc($mhs['nama']) ?></td>

                                    <td><?= esc($mhs['prodi']) ?></td>

                                    <td><?= esc($mhs['ipk']) ?></td>

                                    <td>
                                        <a href="<?= base_url('mahasiswa/ubah/' . $mhs['id']) ?>"
                                            class="btn btn-warning btn-sm">
                                            Ubah
                                        </a>

                                        <a href="<?= base_url('mahasiswa/hapus/' . $mhs['id']) ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="6" class="text-center">
                                    Belum ada data mahasiswa.
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>