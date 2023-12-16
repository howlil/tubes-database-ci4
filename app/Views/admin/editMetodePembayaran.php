<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <?php
// Assuming you have a PDO connection set up as $pdo

$paymentMethods = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Metode_Pembayaran'])) {
    // Sanitize input
    $metodePembayaran = filter_input(INPUT_POST, 'Metode_Pembayaran', FILTER_SANITIZE_STRING);
    
    // Insert into database (using prepared statements to prevent SQL injection)
    $stmt = $pdo->prepare("INSERT INTO Metode_Pembayaran (Metode_Pembayaran) VALUES (:metodePembayaran)");
    $stmt->bindParam(':metodePembayaran', $metodePembayaran);
    $stmt->execute();
    
    // Fetch the updated list of payment methods
    $paymentMethods = $pdo->query("SELECT * FROM Metode_Pembayaran")->fetchAll(PDO::FETCH_ASSOC);
}
?>

        <div class="container mt-5">
            <h2>Payment Method Entry Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="paymentMethodName" class="form-label">Payment Method Name</label>
                    <input type="text" class="form-control" id="paymentMethodName" name="Metode_Pembayaran" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <!-- Display payment methods -->
            <div class="mt-4">
                <h3>Payment Methods</h3>
                <ul class="list-group">
                    <?php foreach ($paymentMethods as $method) : ?>
                    <li class="list-group-item"><?= htmlspecialchars($method['Metode_Pembayaran']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>