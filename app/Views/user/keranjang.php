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
                    <div class="add-title">
                        <h6 class="text-black  fw-bold">Keranjang Belanja
                        </h6>
                        <hr>
                        <div class="p-0 m-0 d-flex align-items-center gap-2">
                            <p class="p-0 m-0">Selamat! Anda mendapatkan potongan ongkos kirim hingga Rp 60.000 </p>
                            <div>
                                <img class="p-0 m-0"
                                    src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.1/icons/ic-information.svg" alt="">
                            </div>
                        </div>
                        <hr>

                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="custom-checkbox">
                                <input type="checkbox" class="styled-checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <p class="mb-0 fw-bold text-black">Pilih Semua</p>
                        </div>
                        <div>
                            <a class="text-decoration-none text-success fw-bold" href="#">Hapus</a>
                        </div>
                    </div>

                    <?php foreach ($produk as $product): ?>
                    <div class="media m-4 d-flex mt-5 justify-content-between">
                        <div class="img-sec d-flex gap-2">
                            <label class="custom-checkbox-p">
                                <input type="checkbox" class="styled-checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <img src="<?= $product['Gambar']; ?>" height="70" class="mr-3"
                                alt="<?= $product['Nama_Barang']; ?>">
                            <div class="media-body">
                                <h6 class="mt-0"><?= $product['Nama_Barang']; ?></h6>
                                <p><?= $product['Deskripsi_Belanja']; ?></p>
                            </div>
                        </div>
                        <div class="price d-flex gap-5">
                            <p class="pricet">Rp <?= number_format($product['Harga_Barang'], 2, ',', '.'); ?></p>
                            <p>x<?= $product['stok']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>


                    <!-- 
                    <div class="media m-4 d-flex mt-5 justify-content-between">
                        <div class="img-sec d-flex gap-2">
                            <label class="custom-checkbox-p">
                                <input type="checkbox" class="styled-checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <img src="/img/cb/cb-cremaExpreso.jpg" height="70" class="mr-3" alt="Crema Espresso">
                            <div class="media-body ">
                                <h6 class="mt-0">Crema Espresso - Kopi House Blend 500gr</h6>
                                <p>Wholebean (Biji Kopi)</p>
                            </div>
                        </div>
                        <div class="price d-flex gap-5">
                            <p class="pricet">Rp 119.000 </p>
                            <p>x1</p>
                        </div>
                    </div> -->

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
                                    <a class="btnc" href="/checkout/pengiriman">Beli</a>
                                </button>s
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <?= $this->endSection() ?>