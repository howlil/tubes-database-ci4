<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <div class="container my-5">
            <h2>Tambah Metode Pembayaran</h2>
            <form action="<?= base_url('/add-pengiriman') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="idMethodName" class="form-label">ID Metode Pengiriman</label>
                    <input type="text" class="form-control" id="idMethodName" name="ID_Metode_Pengiriman">
                </div>
                <div class="mb-3">
                    <label for="shipMethodName" class="form-label">Nama Metode Pengiriman</label>
                    <input type="text" class="form-control" id="shipMethodName" name="Nama_Metode_Pengiriman" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="mt-4">
                <?php if (isset($ship)) : ?>
                <h3 class="mt-4">Daftar Metode Pengiriman</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Metode</th>
                            <th>Nama Metode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ship as $s) : ?>
                        <tr>
                            <td><?= htmlspecialchars($s['ID_Metode_Pengiriman']) ?></td>
                            <td><?= htmlspecialchars($s['Metode_Pengiriman']) ?></td>
                            <td>
                                <a href="/hapus-pengiriman/<?= $s['ID_Metode_Pengiriman']; ?>" class="btn btn-danger"><i
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
</div>
<?= $this->endSection() ?>