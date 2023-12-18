<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <div class="container my-5">
            <h2>Tambah Metode Pembayaran</h2>
            <form action="<?= base_url('/add-pembayaran') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="idMethodName" class="form-label">ID Metode Pembayaran</label>
                    <input type="text" class="form-control" id="idMethodName" name="ID_Metode_Pembayaran">
                </div>
                <div class="mb-3">
                    <label for="paymentMethodName" class="form-label">Nama Metode Pembayaran</label>
                    <input type="text" class="form-control" id="paymentMethodName" name="Nama_Metode_Pembayaran"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- Display payment methods -->
            <?php if (isset($pay)) : ?>
            <h3 class="mt-4">Daftar Metode Pembayaran</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Metode</th>
                        <th>Nama Metode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pay as $p) : ?>
                    <tr>
                        <td><?= htmlspecialchars($p['ID_Metode_Pembayaran']) ?></td>
                        <td><?= htmlspecialchars($p['Metode_Pembayaran']) ?></td>
                        <td>
                            <a href="/hapus-pembayaran/<?= $p['ID_Metode_Pembayaran']; ?>" class="btn btn-danger"><i
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