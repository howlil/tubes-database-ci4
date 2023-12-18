<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">


        <div class="container mt-5">
            <h2>Formulir Entri Diskon</h2>
            <form action="<?= base_url('/add-diskon') ?>" method="post">
                <div class="mb-3">
                    <label for="kodeDiskon" class="form-label">Kode Diskon</label>
                    <input type="text" class="form-control" id="kodeDiskon" name="kodeDiskon" required>
                </div>
                <div class="mb-3">
                    <label for="nilaiDiskon" class="form-label">Nilai Diskon</label>
                    <input type="number" step="0.01" class="form-control" id="nilaiDiskon" name="nilaiDiskon" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggalMulai" name="tanggalMulai" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalBerakhir" class="form-label">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="tanggalBerakhir" name="tanggalBerakhir" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Diskon</button>
            </form>

            <!-- Tampilkan diskon -->
            <div class="mt-4">
                <h3>Daftar Diskon</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Diskon</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Berakhir</th>
                            <th scope="col"> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($diskon as $d): ?>
                        <tr>
                            <td><?= htmlspecialchars($d['Kode_Diskon']) ?></td>
                            <td><?= htmlspecialchars($d['Nilai']) ?></td>
                            <td><?= htmlspecialchars($d['Tanggal_Mulai']) ?></td>
                            <td><?= htmlspecialchars($d['Tanggal_Berakhir']) ?></td>
                            <td>
                                <a href="<?= base_url('/hapus-diskon/' . $d['Kode_Diskon']) ?>"
                                    class="btn btn-danger btn-sm">Hapus</a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>