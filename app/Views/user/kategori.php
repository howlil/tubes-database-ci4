<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>
<div class="container">

    <div class="coffee-section">
        <nav class="breadcrumb-wrap mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/coffee">Coffee</a></li>
                <li class="breadcrumb-item active" aria-current="page">Drip Coffee</li>
            </ol>
        </nav>

        <div class="coffee-header">
            <img src="/img/cb/cb-hero.jpg" class="img-fluid">
            <p class="mt-3">Roasted Coffee Beans merupakan biji kopi yang disangrai dengan level tepat sehingga karakter
                rasa yang
                tercipta lebih optimal. Menjual biji kopi yang telah disangrai, dengan ragam pilihan biji kopi dari
                berbagai
                daerah, mulai dari Aceh hingga Papua.</p>
        </div>

        <div class="button-group d-flex justify-content-between mt-4">
            <a href="/all" class="button">Semua</a>
            <a href="/coffee-beans" class="button">Coffee Beans</a>
            <a href="/drip-coffee" class="button">Drip Coffee</a>
            <a href="/cold-brew" class="button">Cold Brew</a>
            <a href="/ready-to-drink" class="button">Ready to Drink</a>
            <a href="/kopi-luwak" class="button">Kopi Luwak</a>
            <a href="/green-bean" class="button">Green Bean</a>
            <a href="/capsules" class="button">Capsules</a>
        </div>

    </div>

    <div class="product-section mt-5">
        <div class="product-header ">
            <h6>160 Kopi Tersedia</h6>
            <h2 class="">Kopi Pilihan Terbaik Untukmu</h2>

            <div class="product-filters">
                <button>Filter</button>
                <button>Urutkan</button>
                <button>Best Seller</button>
                <button>Indonesia</button>
                <button>International</button>
            </div>
        </div>
        <div class="product d-flex mb-5 flex-column">
            <div class="product-grid">
                <?php foreach ($produk as $p) : ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= $p['Gambar'] ?>" alt="<?= $p['Nama_Barang'] ?>">
                    </div>
                    <div class="product-details d-flex flex-column ">
                        <h3><?= $p['Nama_Barang'] ?></h3>
                        <div class="product-price"><?= $p['Harga_Barang'] ?></div>


                        <form action="<?= base_url('/add-keranjang') ?>" method="post">
                            <input type="hidden" name="product_id" value="<?= $p['ID_Produk']; ?>">
                            <input type="hidden" name="product_price" value="<?= $p['Harga_Barang']; ?>">

                            <div class="d-grid mt-3  mx-9 ">
                                <button class="btn btn-success" type="submit" id="addKeranjang">+
                                    Keranjang</button>
                            </div>
                        </form>


                    </div>

                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- The Modal -->
        <div id="cartModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Tambahkan Ke Keranjang</h2>
                <div class="modal-body">
                    <div class="modal-product">
                        <img src="/img/cb/cb-cremaExpreso.jpg" alt="Product Image">
                        <div class="product-details">
                            <p class="product-name">Crema Espresso - Kopi House Blend 500gr</p>
                            <p class="product-price">Rp 119.000</p>
                            <div class="quantity-selector">
                                <button class="quantity-minus">-</button>
                                <input type="number" value="1" class="quantity-input">
                                <button class="quantity-plus">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="/checkout/pengiriman"><button id="buyNowBtn">Beli Langsung</button></a>
                        <a href=""> <button id="addToCartModalBtn">+ Keranjang</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="/js/addcart.js">

</script>
<?= $this->endSection() ?>