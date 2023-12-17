<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <?php
// Inisialisasi array untuk menyimpan data flash sale
$flashSales = [];

// Sertakan koneksi database Anda di sini
// $pdo = new PDO('dsn_database_anda', 'username_anda', 'password_anda');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Waktu_Mulai']) && !empty($_POST['Waktu_Berakhir'])) {
    // Sanitasi inputan
    $waktuMulai = filter_input(INPUT_POST, 'Waktu_Mulai', FILTER_SANITIZE_STRING);
    $waktuBerakhir = filter_input(INPUT_POST, 'Waktu_Berakhir', FILTER_SANITIZE_STRING);
    $nilaiFlashSale = filter_input(INPUT_POST, 'Nilai', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Masukkan ke dalam database dan ambil daftar terbaru
    $stmt = $pdo->prepare("INSERT INTO Flash_Sale (Waktu_Mulai, Waktu_Berakhir, Nilai) VALUES (:waktuMulai, :waktuBerakhir, :nilaiFlashSale)");
    $stmt->execute([
        ':waktuMulai' => $waktuMulai,
        ':waktuBerakhir' => $waktuBerakhir,
        ':nilaiFlashSale' => $nilaiFlashSale
    ]);

    // Ambil daftar flash sale yang terbaru
    $flashSales = $pdo->query("SELECT * FROM Flash_Sale")->fetchAll(PDO::FETCH_ASSOC);
}
?>

        <div class="container mt-5">
            <h2>Formulir Entri Flash Sale</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="waktuMulai" class="form-label">Waktu Mulai (Jam:Menit)</label>
                    <input type="time" class="form-control" id="waktuMulai" name="Waktu_Mulai" required>
                </div>
                <div class="mb-3">
                    <label for="waktuBerakhir" class="form-label">Waktu Berakhir (Jam:Menit)</label>
                    <input type="time" class="form-control" id="waktuBerakhir" name="Waktu_Berakhir" required>
                </div>
                <div class="mb-3">
                    <label for="nilaiFlashSale" class="form-label">Nilai Flash Sale</label>
                    <input type="number" step="0.01" class="form-control" id="nilaiFlashSale" name="Nilai" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Flash Sale</button>
            </form>

            <!-- Tampilkan flash sale -->
            <div class="mt-4">
                <h3>Daftar Flash Sale</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Berakhir</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($flashSales as $sale): ?>
                        <tr>
                            <td><?= htmlspecialchars($sale['Waktu_Mulai']) ?></td>
                            <td><?= htmlspecialchars($sale['Waktu_Berakhir']) ?></td>
                            <td><?= htmlspecialchars($sale['Nilai']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>