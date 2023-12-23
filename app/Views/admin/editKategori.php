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

                <button type="submit" class="btn btn-primary">Tambah Subkategori</button>
            </form>
        </div>
        <div class="my-5">
            <h2>Daftar Kategori dan Sub Kategori</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Subkategori</th>
                        <th>hapus Subkategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kategoriTerlihat = []; // Untuk menyimpan kategori yang sudah ditampilkan
                    foreach ($kategori as $item) :
                        if (!in_array($item['Nama'], $kategoriTerlihat)) {
                            $kategoriTerlihat[] = $item['Nama']; // Tandai kategori ini sebagai ditampilkan
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($item['Nama']) ?></td>
                        <td>
                            <?php
                                    // Menampilkan semua subkategori dan gambar untuk kategori ini
                                    foreach ($kategori as $subItem) {
                                        if ($subItem['Nama'] == $item['Nama']) {
                                            echo htmlspecialchars($subItem['SubKategoriNama']);
                                            if (isset($subItem['Gambar']) && !empty($subItem['Gambar'])) :
                                                echo '<br><img src="' . base_url('public/img/' . $subItem['Gambar']) . '" width="50" height="50">';
                                            endif;
                                            echo '<br>  <br>';
                                        }
                                    }
                                    ?>
                        </td>
                        <td>
                            <?php
                                    foreach ($kategori as $subItem) {
                                        if ($subItem['ID_Kategori'] == $item['ID_Kategori'] && isset($subItem['ID_SubKategori'])) {
                                            echo ' <a href="' . base_url('/hapus-subkategori/' . $subItem['ID_SubKategori']) . '" class="btn btn-danger btn-sm">Hapus</a>';
                                            echo '<br>  <br>';
                                        }
                                    }
                                    ?>
                        </td>
                        <td>
                            <!-- Logic untuk tombol hapus kategori -->
                            <a href="<?= base_url('/hapus-kategori/' . $item['ID_Kategori']) ?>"
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

    </div>
</div>
<?= $this->endSection() ?>