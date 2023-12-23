<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <div class="container my-5">
            <h2>Formulir Entri Flash Sale</h2>
            <form action="<?= base_url('/add-flash-sale') ?>" method="post">
                <div class="mb-3">
                    <label for="waktuMulai" class="form-label">ID FLash Sale</label>
                    <input type="text" class="form-control" id="flashsaleID" name="flashsaleID" required>
                </div>
                <div class="mb-3">
                    <label for="waktuMulai" class="form-label">Waktu Mulai (Jam:Menit)</label>
                    <input type="time" class="form-control" id="waktuMulai" name="waktuMulai" required>
                </div>
                <div class="mb-3">
                    <label for="waktuBerakhir" class="form-label">Waktu Berakhir (Jam:Menit)</label>
                    <input type="time" class="form-control" id="waktuBerakhir" name="waktuBerakhir" required>
                </div>
                <div class="mb-3">
                    <label for="nilaiFlashSale" class="form-label">Nilai Flash Sale</label>
                    <input type="number" step="0.01" class="form-control" id="nilaiFlashSale" name="nilaiFlashSale" required>
                </div>
                <div class="mb-3">
                    <label for="namaFlashSale" class="form-label"> Nama Flsh Sale</label>
                    <input type="text" class="form-control" id="namaFlashSale" name="namaFlashSale" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Flash Sale</button>
            </form>

            <!-- Tampilkan flash sale -->
            <div class="mt-4">
                <h3>Daftar Flash Sale</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Flash Sale</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Berakhir</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Nama Flash Sale</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($flashsale as $sale) : ?>
                            <tr>
                                <td><?= htmlspecialchars($sale['ID_Flash_Sale']) ?></td>
                                <td><?= htmlspecialchars($sale['Waktu_Mulai']) ?></td>
                                <td><?= htmlspecialchars($sale['Waktu_Berakhir']) ?></td>
                                <td><?= htmlspecialchars($sale['Nilai']) ?></td>
                                <td><?= htmlspecialchars($sale['Nama']) ?></td>
                                <td>
                                    <a href="<?= base_url('/hapus-flash-sale/' . $sale['ID_Flash_Sale']) ?>" class="btn btn-danger btn-sm">Hapus</a>
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