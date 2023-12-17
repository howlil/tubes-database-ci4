<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">

        <?php
// Sertakan koneksi database Anda di sini
// $pdo = new PDO('dsn_database_anda', 'username_anda', 'password_anda');

// Ambil data produk dari database dengan join tabel kategori dan subkategori
try {
    $query = "
        SELECT p.ID_Produk, p.Nama_Barang, p.Harga_Barang, p.Deskripsi_Belanja, p.Stok, p.Gambar, 
               k.Nama AS Nama_Kategori, sk.Nama AS Nama_SubKategori 
        FROM Produk p
        LEFT JOIN Sub_Kategori sk ON p.ID_SubKategori = sk.ID_SubKategori
        LEFT JOIN Kategori k ON sk.ID_Kategori = k.ID_Kategori";
    $stmt = $pdo->query($query);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $products = [];
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>

        <div class="container mt-5">
            <h2>Dashboard Produk</h2>

            <!-- Tabel produk -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Produk</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Subkategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Gambar</th>
                        <!-- Kolom lainnya jika diperlukan -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['ID_Produk']) ?></td>
                        <td><?= htmlspecialchars($product['Nama_Barang']) ?></td>
                        <td><?= htmlspecialchars($product['Harga_Barang']) ?></td>
                        <td><?= htmlspecialchars($product['Deskripsi_Belanja']) ?></td>
                        <td><?= htmlspecialchars($product['Nama_Kategori']) ?></td>
                        <td><?= htmlspecialchars($product['Nama_SubKategori']) ?></td>
                        <td><?= htmlspecialchars($product['Stok']) ?></td>
                        <td><img src="<?= htmlspecialchars($product['Gambar']) ?>" alt="Gambar Produk"
                                style="height: 50px;"></td>
                        <!-- Tampilkan data lain jika diperlukan -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>