<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-3">
    <div class="container">
        <nav aria-label="breadcrumb   ">
            <div class="logootten">
                <a class="navbar-brand align-items-center d-flex" href="/">
                    <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/images/logo-otten-coffee.png"
                        alt="logo-otten-coffee" width="75">
                </a>
            </div>
            <ol class="breadcrumb gap-4">
                <li class="breadcrumb-list">
                    <a href="">1. Pengiriman</a>
                </li>
                <li class="breadcrumb-list">
                    <i class="fa-solid fa-greater-than"></i>
                </li>
                <li class="breadcrumb-list"><a href="">2. Pembayaran</a></li>
                <li class="breadcrumb-list">
                    <i class="fa-solid fa-greater-than"></i>
                </li>
                <li class="breadcrumb-list"><a href="">3. Selesai</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="container checkout  my-5">
        <div class="row">
            <div class="col-md-8 left">
                <div class="shipping p-3 mb-4">
                    <div class="pay ">
                        <h6>Metode Pembayaran</h6>
                        <div class="payment-methods">
                            <div class="method">
                                <input type="radio" id="eWallet" name="paymentMethod" value="eWallet">
                                <label for="eWallet">E-Wallet</label>
                                <div class="bank-options">
                                    <div class="bank-option">
                                        <img width="50"
                                            src="https://s-ecom.ottenstatic.com/thumbnail/5f3bebe6ea5c4650101111.png"
                                            alt="BNI">
                                        <span>Virtual Account BNI</span>
                                    </div>
                                    <div class="bank-option">
                                        <img src="path-to-permata-logo.png" alt="Permata">
                                        <span>Virtual Account Permata</span>
                                    </div>
                                    <div class="bank-option">
                                        <img src="path-to-mandiri-logo.png" alt="Mandiri">
                                        <span>Virtual Account Mandiri</span>
                                    </div>
                                    <div class="bank-option">
                                        <img src="path-to-bca-logo.png" alt="BCA">
                                        <span>Virtual Account BCA</span>
                                    </div>
                                    <div class="bank-option">
                                        <img src="path-to-bri-logo.png" alt="BRI">
                                        <span>Virtual Account BRI</span>
                                    </div>
                                </div>
                            </div>
                            <div class="method">
                                <input type="radio" id="bankTransfer" name="paymentMethod" value="bankTransfer" checked>
                                <label for="bankTransfer">Transfer Bank (Verifikasi Otomatis)</label>
                                <div class="bank-options">
                                    <div class="bank-option">
                                        <img width="50"
                                            src="https://s-ecom.ottenstatic.com/thumbnail/5f3bebe6ea5c4650101111.png"
                                            alt="BNI">
                                        <span>Virtual Account BNI</span>
                                    </div>
                                    <div class="bank-option">
                                        <img src="path-to-permata-logo.png" alt="Permata">
                                        <span>Virtual Account Permata</span>
                                    </div>
                                    <div class="bank-option">
                                        <img src="path-to-mandiri-logo.png" alt="Mandiri">
                                        <span>Virtual Account Mandiri</span>
                                    </div>
                                    <div class="bank-option">
                                        <img src="path-to-bca-logo.png" alt="BCA">
                                        <span>Virtual Account BCA</span>
                                    </div>
                                    <div class="bank-option">
                                        <img src="path-to-bri-logo.png" alt="BRI">
                                        <span>Virtual Account BRI</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 right">
                <div class=" ">
                    <div class="card">
                        <div class="card-header">
                            <a href="#detailPembayaran" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                aria-controls="detailPembayaran"
                                class="stretched-link text-decoration-none text-dark">Detail Pembayaran</a>
                        </div>
                        <div class="collapse" id="detailPembayaran">
                            <div class="card-body">
                                <!-- Payment details go here -->
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <a href="#pesananAnda" data-bs-toggle="collapse" role="button" aria-expanded="true"
                                aria-controls="pesananAnda"
                                class="stretched-link text-decoration-none text-dark">Pesanan Anda</a>
                        </div>
                        <div class="collapse show" id="pesananAnda">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <img src="path_to_your_image.jpg" alt="Cold Brew" class="img-fluid"
                                        style="max-width: 60px; height: auto;">
                                    <div class="ms-2">
                                        <p class="mb-0 fw-bold">Cold Brew 1L - Arabica Lintong Semi Washed (Set)
                                        </p>
                                        <p class="text-muted">Rp 198.000</p>
                                    </div>
                                    <span class="badge bg-secondary">x1</span>
                                </div>
                                <!-- Repeat the above div for each item in the order -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?= $this->endSection() ?>