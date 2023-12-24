<div class="container-fluid info-wrap  d-flex justify-content-center gap-5">
    <div class="info ">
        <a href="#">
            <img src="https://ottencoffee.co.id/icons/converted-icons/ic-guarantee.svg" alt="">
            <p>
                Garansi 2 Tahun
            </p>
        </a>
    </div>
    <div class="info">
        <a href="#">
            <img src="https://ottencoffee.co.id/icons/converted-icons/ic-delivery-truck.svg" alt="">
            <p>
                Gratis Ongkir
            </p>
        </a>
    </div>
    <div class="info">
        <a href="#">
            <img src="https://ottencoffee.co.id/icons/converted-icons/ic-shield.svg" alt="">
            <p>
                Produk Original
            </p>
        </a>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container header">
        <!-- Logo -->
        <a class="navbar-brand align-items-center d-flex" href="/">
            <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/images/logo-otten-coffee.png" alt="logo-otten-coffee" width="75">
        </a>

        <!-- Toggler untuk mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse align-items-center" id="navbarNav">
            <div class="hover-category">
                <img src="/img/grid.svg" alt="" style="width:28px">
                <label for="showMega">
                    Kategori
                </label>
                <input type="checkbox" id="showMega">
            </div>

            <!-- Search Bar -->
            <form class="d-flex flex-grow-1 me-auto">
                <input class="form-control" type="search" placeholder="Pay Day November Disc 90% + Extra voucher 800rb" aria-label="Search" style="max-width: 400px;">
            </form>

            <!-- Navbar icons -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link  d-flex align-self-center align-item-center gap-1" href="/customer/point">
                        <img src="/img/ic-otten-point.svg" alt="otten point icon" style="width: 28px;">
                        <span>0</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link position-relative" href="#">
                        <img src="/img/bell.svg" alt="">
                        <span class="position-absolute  translate-middle badge rounded-pill bg-danger">
                            0
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </li>
                <!-- <li class="nav-item mx-2">
                    <a class="nav-link position-relative" href="#">
                        <img src="/img/cart.svg" alt="">
                        <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                            0
                            <span class="visually-hidden">unread notifications</span>
                        </span>
                    </a>
                </li> -->
                <li class="nav-item mx-2 cart-hover">
                    <a class="nav-link position-relative" href="#" id="cartHoverArea">
                        <img src="/img/cart.svg" alt="Cart">
                        <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                            0
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>

                    <div class="cart-summary position-absolute">
                        <div class="d-flex flex-column align-items-start p-3 bg-white border rounded">
                            <?php if (!empty($produkcart)) : ?>
                                <h6 class="text-dark fw-bold mb-1">Subtotal: <span id="subtotalCart"></span></h6>
                                <hr>
                                <?php foreach ($produkcart as $produk) : ?>
                                    <div class="product-in-cart d-flex gap-2 mb-2">
                                        <img src="<?= $produk['Gambar']; ?>" alt="<?= $produk['Nama_Barang']; ?>" style="width: 50px; height: 50px;">
                                        <div>
                                            <p><?= $produk['Nama_Barang']; ?></p>
                                            <p>Rp <?= number_format($produk['Harga_Beli'], 2, ',', '.'); ?> x
                                                <?= $produk['Jumlah_Barang']; ?></p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="<?= base_url('/hapus-dari-keranjang/' . $produk['ID']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <button class="btn btn-success d-grid col-12 mx-auto mt-2">
                                    <a class="text-decoration-none text-white" href="/keranjang">Lihat Keranjang</a>
                                </button>
                            <?php else : ?>
                                <p>Keranjang kosong</p>
                            <?php endif; ?>
                        </div>
                    </div>


                </li>

                <?php if (logged_in()) : ?>
                    <li class="nav-item dropdown no-arrow ms-5" id="userDropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/images/default-profile.png" alt="Image default profile" class="rounded-circle" style="width: 32px;">
                        </a>
                        <!-- Dropdown - User Information -->
                        <?php if (in_groups('admin')) : ?>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('/dashboard') ?>">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Kelola Web
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('/logout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('/setting') ?>">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Setting Akun
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('/logout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php else : ?>
                    <li class="nav-item ms-5">
                        <a style="background-color: #6dbf67;" class="btn text-white fw-boldp " href="<?= base_url('/login') ?>">Login</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
    <div class="category-sidebar mt-3">
        <div class="category-content ">
            <div class="container  ">
                <div class="category-list-container d-flex gap-4 ">

                    <ul class="category-list">
                        <?php foreach ($kategori as $kat) : ?>
                            <li class="category-item" data-kategori="<?= $kat['ID_Kategori']; ?>">
                                <a href="<?= base_url('/kategori') ?>">
                                    <h5><?= htmlspecialchars($kat['Nama']); ?></h5>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>


                    <div class=" product-display">
                        <?php foreach ($subkategori as $subkat) : ?>
                            <div class="product-category " data-kategori="<?= $subkat['ID_Kategori']; ?>">

                                <a class="text-secondary d-flex gap-3 align-items-centern py-2 px-3 " href="<?= base_url('/kategori') ?>">
                                    <i class="fas fa-coffee"></i>
                                    <h6 class="p-0 m-0"><?= $subkat['Nama']; ?></h6>
                                </a>

                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        let subtotal = 0;
        document.querySelectorAll('.product-in-cart').forEach((product) => {
            const price = parseFloat(product.querySelector('.product-price').textContent.replace('Rp ', '').replace(
                ',', '.'));
            const quantity = parseInt(product.querySelector('.quantity-input').value);
            subtotal += price * quantity;
        });
        document.getElementById('subtotalCart').textContent = `Rp ${subtotal.toFixed(2).replace('.', ',')}`;
    </script>





</nav>