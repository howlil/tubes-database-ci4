<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>
<div class="container">

    <div class="coffee-section">
        <nav class="breadcrumb-wrap mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/coffee">Coffee</a></li>
                <li class="breadcrumb-item active" aria-current="page">Coffee Beans</li>
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
        <div class="product-grid">

            <div class="product-card">
                <div class="product-image">
                    <img src="/img/cb/cb-cremaExpreso.jpg" alt="Crema Espresso">
                </div>
                <div class="product-details">
                    <h3>Crema Espresso - Kopi House Blend 500gr</h3>
                    <div class="product-price">Rp 119.000</div>
                    <div class="product-rating">⭐ 5 (2373)</div>
                    <button id="addToCartBtn" class="add-to-cart-btn">Keranjang</button>
                </div>
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
                    <div class="grind-size">
                        <p>Ukuran Gilingan</p>
                        <div class="grind-options">
                            <!-- Repeat this block for each grind option -->
                            <button class="grind-option active">Wholebean</button>
                            <button class="grind-option">Fine</button>
                            <button class="grind-option">Medium</button>
                            <!-- Repeat ends -->
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