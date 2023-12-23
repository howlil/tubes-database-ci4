<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>
<div id="content-wrapper " class="d-flex flex-column">

    <?= $this->include('/admin/layout/navbar') ?>
    <div class="container-fluid">
        <div class="container my-5">
            <h2 class="mb-3">Dashboard Produk</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Produk</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Flash Sale</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Subkategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <h2>Daftar Kategori dan Sub Kategori</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Subkategori</th>
                            <th>Gambar Subkategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $kat) : ?>
                        <tr>
                            <td><?= htmlspecialchars($kat['Nama']) ?></td>
                            <td><?= htmlspecialchars($kat['SubKategoriNama']) ?></td>
                            <td>
                                <?php if (isset($kat['Gambar']) && $kat['Gambar'] != '') : ?>
                                <img src="<?= base_url('public/images/' . htmlspecialchars($kat['Gambar'])); ?>"
                                    alt="Subkategori Image" style="max-width: 100px; max-height: 100px;">
                                <?php else : ?>
                                <p>Gambar tidak tersedia</p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (isset($kat['ID_SubKategori'])) : ?>
                                <a href="<?= base_url('/hapus-subkategori/' . $kat['ID_SubKategori']) ?>"
                                    class="btn btn-danger btn-sm">Hapus Subkategori</a>
                                <?php endif; ?>
                                <a href="<?= base_url('/hapus-kategori/' . $kat['ID_Kategori']) ?>"
                                    class="btn btn-danger">Hapus Kategori</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>