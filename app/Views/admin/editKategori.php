<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <div class="container mt-5">
            <h2>Tambah Kategori</h2>
            <form action="/tambah-kategori" method="post">
                <div class="mb-3">
                    <label for="namaKategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori" required>
                </div>
                <div class="mb-3">
                    <label for="namaSubKategori" class="form-label">Nama Subkategori</label>
                    <input type="text" class="form-control" id="namaSubKategori" name="namaSubKategori" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
        <div class="container my-5">
            <h2>Daftar Kategori dan Subkategori</h2>
            <?php foreach ($kategori as $kat): ?>
            <div class="card mt-3">
                <div class="card-header">
                    <?= htmlspecialchars($kat['namaKategori']) ?>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($kat['subkategori'] as $sub): ?>
                    <li class="list-group-item"><?= htmlspecialchars($sub) ?>
                        <a href="/hapus-subkategori/<?= $sub['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <a href="/hapus-kategori/<?= $kat['id'] ?>" class="btn btn-danger">Hapus Kategori</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>