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
                <tbody>
                    <?php $shownIds = []; ?>
                    <?php foreach ($produk as $p) : ?>
                    <?php if (in_array($p['ID_Produk'], $shownIds)) continue; ?>
                    <?php $shownIds[] = $p['ID_Produk']; ?>
                    <tr>
                        <td><?= $p['ID_Produk']; ?></td>
                        <td class="dsc"><?= htmlspecialchars($p['Nama_Barang']); ?></td>
                        <td><?= $p['NamaFlashSale'] ?? 'Tidak Ada'; ?></td>
                        <td><?= $p['Kode_Diskon'] ? htmlspecialchars($p['Kode_Diskon']) : 'Tidak Ada'; ?></td>
                        <td><?= htmlspecialchars($p['Harga_Barang']); ?></td>
                        <td class="dsc"><?= htmlspecialchars($p['Deskripsi_Barang']); ?></td>
                        <td><?= htmlspecialchars($p['KategoriNama']); ?></td>
                        <td><?= htmlspecialchars($p['NamaSubKategori'] ?? 'Subkategori Tidak Diketahui'); ?></td>
                        <td><?= htmlspecialchars($p['Stok']); ?></td>
                        <td>
                            <img src="<?= $p['Gambar'] ?>" alt="<?= $p['Nama_Barang'] ?>" width="50">
                        </td>
                        <td>
                            <a href="<?= base_url('/hapus-produk/' . $p['ID_Produk']); ?>"
                                class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>