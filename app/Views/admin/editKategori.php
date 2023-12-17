<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">

        <?php
// Inisialisasi koneksi database (Ganti dengan koneksi database Anda)
 $pdo = new PDO('mysql:host=localhost;dbname=ottencoffee', 'username', 'password');

$kategori = [];
$subkategoriByKategori = [];


try {
    // Ambil semua kategori
    $stmtKategori = $pdo->query("SELECT * FROM Kategori");
    $kategori = $stmtKategori->fetchAll(PDO::FETCH_ASSOC);

    // Ambil semua subkategori
    $stmtSubKategori = $pdo->query("SELECT * FROM Sub_Kategori");
    $subkategori = $stmtSubKategori->fetchAll(PDO::FETCH_ASSOC);

    // Mengorganisir subkategori berdasarkan kategori
    foreach ($subkategori as $sub) {
        $subkategoriByKategori[$sub['ID_Kategori']][] = $sub;
    }
} catch (PDOException $e) {
    echo "Terjadi kesalahan pada database: " . $e->getMessage();
}
?>

        <div class="container mt-5">
            <h2>Daftar Kategori dan Subkategori</h2>
            <?php foreach ($kategori as $kat): ?>
            <div class="card mt-3">
                <div class="card-header">
                    <?= htmlspecialchars($kat['Nama']) ?>
                </div>
                <ul class="list-group list-group-flush">
                    <?php if (isset($subkategoriByKategori[$kat['ID_Kategori']])): ?>
                    <?php foreach ($subkategoriByKategori[$kat['ID_Kategori']] as $subkat): ?>
                    <li class="list-group-item"><?= htmlspecialchars($subkat['Nama']) ?></li>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <li class="list-group-item">Tidak ada subkategori</li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>