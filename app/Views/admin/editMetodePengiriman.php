<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <?php
// Initialize an empty array to store shipping methods
$shippingMethods = [];

// Include your database connection here
// $pdo = new PDO('your_dsn', 'username', 'password');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Metode_Pengiriman'])) {
    // Sanitize the input
    $metodePengiriman = filter_input(INPUT_POST, 'Metode_Pengiriman', FILTER_SANITIZE_STRING);

    // Insert into database and fetch the updated list
    // Use prepared statements to avoid SQL injection
    $stmt = $pdo->prepare("INSERT INTO Metode_Pengiriman (Metode_Pengiriman) VALUES (:metodePengiriman)");
    $stmt->execute([':metodePengiriman' => $metodePengiriman]);

    // Fetch the updated list of shipping methods
    $shippingMethods = $pdo->query("SELECT * FROM Metode_Pengiriman")->fetchAll(PDO::FETCH_ASSOC);
}
?>

        <div class="container mt-5">
            <h2>Shipping Method Entry Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="shippingMethodName" class="form-label">Shipping Method Name</label>
                    <input type="text" class="form-control" id="shippingMethodName" name="Metode_Pengiriman" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <!-- Display shipping methods -->
            <div class="mt-4">
                <h3>Shipping Methods</h3>
                <ul class="list-group">
                    <?php foreach ($shippingMethods as $method): ?>
                    <li class="list-group-item"><?= htmlspecialchars($method['Metode_Pengiriman']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>