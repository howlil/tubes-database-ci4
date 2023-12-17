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
                    <label for="jenis" class="form-label">Jenis Voucher</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" required>
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
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($voucher as $v) : ?>
                    <tr>
                        <td><?= htmlspecialchars($v['Voucher']); ?></td>
                        <td><?= htmlspecialchars($v['Nilai']); ?></td>
                        <td><?= htmlspecialchars($v['Jenis_Voucher']); ?></td>
                        <td>
                            <a href="/hapus-voucher/<?= $v['Voucher']; ?>" class="btn btn-danger"><i
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