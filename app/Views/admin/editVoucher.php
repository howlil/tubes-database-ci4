<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <?php
        $vouchers = [];

        // Include your database connection here
        // $pdo = new PDO('your_dsn', 'username', 'password');

        if (
            $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Voucher']) && !empty($_POST['Nilai']) &&
            !empty($_POST['Jenis_Voucher'])
        ) {
            // Sanitize the inputs
            $voucherCode = filter_input(INPUT_POST, 'Voucher', FILTER_SANITIZE_STRING);
            $voucherValue = filter_input(INPUT_POST, 'Nilai', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $voucherType = filter_input(INPUT_POST, 'Jenis_Voucher', FILTER_SANITIZE_STRING);

            // Insert into the database and fetch the updated list
            // Use prepared statements to avoid SQL injection
            $stmt = $pdo->prepare("INSERT INTO Kode_Voucher (Voucher, Nilai, Jenis_Voucher) VALUES (:voucherCode,
        :voucherValue, :voucherType)");
            $stmt->execute([
                ':voucherCode' => $voucherCode,
                ':voucherValue' => $voucherValue,
                ':voucherType' => $voucherType
            ]);

            // Fetch the updated list of vouchers
            $vouchers = $pdo->query("SELECT * FROM Kode_Voucher")->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <div class="container mt-5">
            <h2>Voucher Entry Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="voucherCode" class="form-label">Voucher Code</label>
                    <input type="text" class="form-control" id="voucherCode" name="Voucher" required>
                </div>
                <div class="mb-3">
                    <label for="voucherValue" class="form-label">Voucher Value</label>
                    <input type="number" step="0.01" class="form-control" id="voucherValue" name="Nilai" required>
                </div>
                <div class="mb-3">
                    <label for="voucherType" class="form-label">Voucher Type</label>
                    <input type="text" class="form-control" id="voucherType" name="Jenis_Voucher" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <!-- Display vouchers -->
            <div class="mt-4">
                <h3>Existing Vouchers</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Voucher Code</th>
                            <th scope="col">Value</th>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vouchers as $voucher) : ?>
                            <tr>
                                <td><?= htmlspecialchars($voucher['Voucher']) ?></td>
                                <td><?= htmlspecialchars($voucher['Nilai']) ?></td>
                                <td><?= htmlspecialchars($voucher['Jenis_Voucher']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>