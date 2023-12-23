<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <div class="my-5">
            <h2>Entri Kategori dan Sub Kategori</h2>
            <form action="<?= base_url('/add-kategori') ?>" method="post">
                <div class="mb-3">
                    <label for="kategoriId" class="form-label">ID Kategori</label>
                    <input type="text" class="form-control" id="kategoriId" name="kategoriId" required>
                </div>
                <div class="mb-3">
                    <label for="kategoriNama" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="kategoriNama" name="kategoriNama" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Kategori</button>
            </form>
            <form action="<?= base_url('/add-subkategori') ?>" method="post" class="mt-3">
                <div class="mb-3">
                    <label for="subkategoriId" class="form-label">ID Subkategori</label>
                    <input type="text" class="form-control" id="subkategoriId" name="subkategoriId" required>
                </div>
                <div class="mb-3">
                    <label for="kategoriId" class="form-label">Kategori</label>
                    <select class="form-control" id="kategoriId" name="kategoriId">
                        <?php foreach ($allKategori as $kat) : ?>
                        <?php if (isset($kat['Nama'])) : ?>
                        <option value="<?= $kat['ID_Kategori']; ?>"
                            <?= isset($kategoriId) && $kategoriId == $kat['ID_Kategori'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($kat['Nama']); ?>
                        </option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="subkategoriNama" class="form-label">Nama Subkategori</label>
                    <input type="text" class="form-control" id="subkategoriNama" name="subkategoriNama" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Subkategori</button>
            </form>
        </div>
        <?php if (!empty($kategori)) : ?>
        <div class="my-5">
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
                    <?php
        $kategoriTerlihat = []; // Untuk menyimpan kategori yang sudah ditampilkan
        foreach ($kategori as $kat) :
            if (!in_array($kat['Nama'], $kategoriTerlihat)) {
                $kategoriTerlihat[] = $kat['Nama']; // Tandai kategori ini sebagai ditampilkan
                ?>
                    <tr>
                        <td><?= htmlspecialchars($kat['Nama']) ?></td>
                        <td>
                            <?php if (isset($kat['SubKategori']) && is_array($kat['SubKategori'])): ?>
                            <?php foreach ($kat['SubKategori'] as $subkat): ?>
                            <?= htmlspecialchars($subkat['SubKategoriNama']) ?>
                            <?php if (isset($subkat['ID_SubKategori'])): ?>
                            <a href="<?= base_url('/hapus-subkategori/' . $subkat['ID_SubKategori']) ?>"
                                class="btn btn-danger btn-sm">Hapus</a>
                            <?php endif; ?>
                            <br>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php
                        foreach ($kategori as $subkat) {
                            if ($subkat['Nama'] == $kat['Nama'] && isset($subkat['Gambar']) && !empty($subkat['Gambar'])) {
                                // Menampilkan gambar
                                echo '<img src="' . base_url('public/img/' . $subkat['Gambar']) . '" width="50" height="50"><br>';
                            }
                        }
                        ?>
                        </td>
                        <td>
                            <a href="<?= base_url('/hapus-kategori/' . $kat['ID_Kategori']) ?>"
                                class="btn btn-danger">Hapus Kategori</a>
                        </td>
                    </tr>
                    <?php
            }
        endforeach;
    ?>
                </tbody>


            </table>
        </div>
        <?php endif; ?>


    </div>

</div>
</div>
<?= $this->endSection() ?>