<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">

        <div class="container mt-5">
            <h2>Formulir Entri Voucher</h2>
            <form action="<?= base_url('/addVoucher') ?>" method="post">

                <div class="mb-3">
                    <label for="voucher" class="form-label">Kode Voucher</label>
                    <input type="text" class="form-control" id="voucher" name="voucher" required>
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai Voucher</label>
                    <input type="number" step="0.01" class="form-control" id="nilai" name="nilai" required>
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Nama Voucher</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" pattern="\d{4}-\d{2}-\d{2}" class=" form-control" id="tanggalMulai"
                        name="tanggalMulai" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalBerakhir" class="form-label">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="tanggalBerakhir" name="tanggalBerakhir" required>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Tambah Voucher</button>
            </form>

            <?php if (isset($voucher)) : ?>
            <h3 class="mt-4">Daftar Voucher</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode Voucher</th>
                        <th>Nilai</th>
                        <th>Nama Voucher</th>
                        <th> Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($voucher as $v) : ?>
                    <tr>
                        <td><?= htmlspecialchars($v['ID_Voucher']); ?></td>
                        <td><?= htmlspecialchars($v['Nilai']); ?></td>
                        <td><?= htmlspecialchars($v['Nama_Voucher']); ?></td>
                        <td><?= htmlspecialchars($v['Tanggal_Mulai']); ?></td>
                        <td><?= htmlspecialchars($v['Tanggal_Berakhir']); ?></td>
                        <td>
                            <a href="/hapus-voucher/<?= $v['ID_Voucher']; ?>" class="btn btn-danger"><i
                                    class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>