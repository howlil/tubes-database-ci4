<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <div class="container my-5">
            <h2>Formulir Entri Produk</h2>
            <form action="<?= base_url('/add-produk') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="idProduk" class="form-label">ID Produk</label>
                    <input type="text" class="form-control" id="idProduk" name="ID_Produk" required>
                </div>
                <div class="mb-3">
                    <label for="namaBarang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="namaBarang" name="Nama_Barang" required>
                </div>
                <div class="mb-3">
                    <label for="hargaBarang" class="form-label">Harga Barang</label>
                    <input type="number" class="form-control" id="hargaBarang" name="Harga_Barang" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="Deskripsi_Belanja" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="kategoriDropdown" class="form-label">Kategori</label>
                    <select class="form-select" id="kategoriDropdown" name="ID_Kategori">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($allKategori as $k) : ?>
                            <option required value="<?= $k['ID_Kategori']; ?>"><?= htmlspecialchars($k['Nama']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subKategoriDropdown" class="form-label">Subkategori</label>
                    <select class="form-select" id="subKategoriDropdown" name="ID_SubKategori">
                        <option required value="">Pilih Subkategori</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ID_Diskon" class="form-label">Diskon</label>
                    <select class="form-select" id="ID_Diskon" name="ID_Diskon">
                        <option value="">Pilih Diskon</option>
                        <?php foreach ($allDiskon as $diskon) : ?>
                            <option value="<?= $diskon['Kode_Diskon']; ?>"><?= htmlspecialchars($diskon['Kode_Diskon']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ID_FlashSale" class="form-label">Flash Sale</label>
                    <select class="form-select" id="ID_FlashSale" name="ID_FlashSale">
                        <option value="">Pilih Flash Sale</option>
                        <?php foreach ($allFlashSale as $flashSale) : ?>
                            <option value="<?= $flashSale['ID_FlashSale']; ?>"><?= htmlspecialchars($flashSale['Nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="Stok" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="Gambar" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Produk</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('kategoriDropdown').addEventListener('change', function() {
        fetch('<?= base_url('/get-subkategori') ?>?kategori=' + this.value)
            .then(response => response.json())
            .then(data => {
                var subKategoriDropdown = document.getElementById('subKategoriDropdown');
                subKategoriDropdown.innerHTML = '<option value="">Pilih Subkategori</option>';
                data.forEach(function(subkategori) {
                    var opt = document.createElement('option');
                    opt.value = subkategori.ID_SubKategori;
                    opt.innerHTML = subkategori.Nama;
                    subKategoriDropdown.appendChild(opt);
                });
            })
            .catch(error => console.error('Error:', error));
    });
</script>


<?= $this->endSection() ?>