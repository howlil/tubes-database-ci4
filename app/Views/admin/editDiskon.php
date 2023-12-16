<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <?php
// Inisialisasi array untuk menyimpan data diskon
$diskon = [];

// Sertakan koneksi database Anda di sini
// $pdo = new PDO('dsn_database_anda', 'username_anda', 'password_anda');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Kode_Diskon'])) {
    // Sanitasi inputan
    $kodeDiskon = filter_input(INPUT_POST, 'Kode_Diskon', FILTER_SANITIZE_STRING);
    $nilaiDiskon = filter_input(INPUT_POST, 'Nilai', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $tanggalMulai = filter_input(INPUT_POST, 'Tanggal_Mulai', FILTER_SANITIZE_STRING);
    $tanggalBerakhir = filter_input(INPUT_POST, 'Tanggal_Berakhir', FILTER_SANITIZE_STRING);

    // Masukkan ke dalam database dan ambil daftar terbaru
    $stmt = $pdo->prepare("INSERT INTO Diskon (Kode_Diskon, Nilai, Tanggal_Mulai, Tanggal_Berakhir) VALUES (:kodeDiskon, :nilaiDiskon, :tanggalMulai, :tanggalBerakhir)");
    $stmt->execute([
        ':kodeDiskon' => $kodeDiskon,
        ':nilaiDiskon' => $nilaiDiskon,
        ':tanggalMulai' => $tanggalMulai,
        ':tanggalBerakhir' => $tanggalBerakhir
    ]);

    // Ambil daftar diskon yang terbaru
    $diskon = $pdo->query("SELECT * FROM Diskon")->fetchAll(PDO::FETCH_ASSOC);
}
?>

        <div class="container mt-5">
            <h2>Formulir Entri Diskon</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="kodeDiskon" class="form-label">Kode Diskon</label>
                    <input type="text" class="form-control" id="kodeDiskon" name="Kode_Diskon" required>
                </div>
                <div class="mb-3">
                    <label for="nilaiDiskon" class="form-label">Nilai Diskon</label>
                    <input type="number" step="0.01" class="form-control" id="nilaiDiskon" name="Nilai" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggalMulai" name="Tanggal_Mulai" required>
                </div>
                <div class="mb-3">
                    <label for="tanggalBerakhir" class="form-label">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="tanggalBerakhir" name="Tanggal_Berakhir" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Diskon</button>
            </form>

            <!-- Tampilkan diskon -->
            <div class="mt-4">
                <h3>Daftar Diskon</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Diskon</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Berakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($diskon as $d): ?>
                        <tr>
                            <td><?= htmlspecialchars($d['Kode_Diskon']) ?></td>
                            <td><?= htmlspecialchars($d['Nilai']) ?></td>
                            <td><?= htmlspecialchars($d['Tanggal_Mulai']) ?></td>
                            <td><?= htmlspecialchars($d['Tanggal_Berakhir']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>