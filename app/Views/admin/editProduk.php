<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <div class="container mt-5">
            <h2>Formulir Entri Produk</h2>
            <form action="/path-to-your-product-insert-script" method="post" enctype="multipart/form-data">
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
                    <label for="kategori" class="form-label">Kategori</label>
                    <!-- Ganti dengan dropdown atau input text, tergantung pada implementasi Anda -->
                    <input type="text" class="form-control" id="kategori" name="Kategori">
                </div>
                <div class="mb-3">
                    <label for="subKategori" class="form-label">Subkategori</label>
                    <!-- Ganti dengan dropdown atau input text, tergantung pada implementasi Anda -->
                    <input type="text" class="form-control" id="subKategori" name="Subkategori">
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="Stok" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="gambar" name="Gambar">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Produk</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>