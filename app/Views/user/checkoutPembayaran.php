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
                <!-- Voucher and Points -->
                <div class="v-wrap">
                    <div class="v-top p-3">
                        <div class="voucher mb-3">
                            <h5>Kode Voucher</h5>
                            <div class="vo-w mt-3  d-flex justify-content-between p-3 border rounded">
                                <div class="img-wv">
                                    <img src="https://ottencoffee.co.id/icons/icon-voucher.svg" alt="">
                                    <a class="ms-2 " href="">Dapatkan potongan harga terbaik</a>
                                </div>
                                <div class="iconv">
                                    <i class="fa fa-greater-than"></i>

                                </div>

                            </div>
                        </div>
                        <div class="o-point  mb-3">
                            <h5 class="fs-6">Otten Poin</h5>
                            <div class="o-wrap">
                                <div class="o-btn p-3 d-flex justify-content-between align-items-center">
                                    <div class="0-icon d-flex align-self-center gap-2">
                                        <img class="p-0 m-0" src="https://ottencoffee.co.id/icons/ic-point.svg" alt="">
                                        <p class="p-0 m-0">0</p>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" class="switch-input">
                                        <span class="slider round"></span>
                                    </label>

                                </div>
                                <div class="o-capt">
                                    <p class="text-body-secondary lh-base">Anda dapat menggunakan Otten Poin
                                        maksimum
                                        90%
                                        dari
                                        total belanja setelah
                                        diskon.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="v-bottom p-3 mt-4  ">
                        <div class="order-summary">
                            <h5 class="fs-6">Rincian Pembelian</h5>
                            <hr class="p-0 m-0">
                            <div class=" mt-3 detail-wrap d-flex justify-content-between ">
                                <p> Total harga produk</p>
                                <p>Rp 119.000</p>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="mt-3 detail-wrap d-flex justify-content-between ">
                                <h6> Subtotal (1 Produk)</h6>
                                <h6 style="color: #ed9121;">Rp 119.000</h6>
                            </div>
                            <hr class="p-0 m-0">
                            <h5 class=" mt-3 fs-6">
                                Keuntungan Yang Didapat
                            </h5>
                            <div class="detail-wrap d-flex justify-content-between ">

                                <p>Otten Point</p>
                                <div class="pw d-flex align-items-center gap-2">
                                    <img class="p-0 m-0" src="https://ottencoffee.co.id/icons/ic-point.svg" width="20"
                                        alt="">
                                    <p class="p-0 m-0">1.190</p>
                                </div>

                            </div>
                            <div class="d-grid  mt-3 col-12 mx-auto">
                                <button class="btn " type="button">
                                    <a class="btnc" href="/konfirmasi-pembayaran">Bayar Sekarang</a>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <?= $this->endSection() ?>