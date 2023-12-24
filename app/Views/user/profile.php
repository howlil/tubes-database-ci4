<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container header">
        <!-- Logo -->
        <a class="navbar-brand align-items-center d-flex" href="/">
            <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/images/logo-otten-coffee.png" alt="logo-otten-coffee"
                width="75">
        </a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item mx-2">
                <a class="nav-link  d-flex align-self-center align-item-center gap-1" href="/customer/point">
                    <img src="/img/ic-otten-point.svg" alt="otten point icon" style="width: 28px;">
                    <span>0</span>
                </a>
            </li>
            <li class="nav-item dropdown no-arrow ms-5" id="userDropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/images/default-profile.png"
                        alt="Image default profile" class="rounded-circle" style="width: 32px;">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('/') ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        back
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('/logout') ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>
    </div>
    </div>




</nav>



<div class="container my-5">
    <h2 class="text-center mb-3">Profile Page</h2>
    <div class="p-wrap p-5 m-0 rounded" style="background-color:#f8f9fc">
        <!-- Menampilkan Data Pengguna -->

        <div class="p-con d-flex flex-row ">
            <div class="col">
                <img src="https://dl54du30pg39i.cloudfront.net/e-commerce/images/cara-ngopi-01.svg" alt="" width="300">
                <div class="dtl my-2">
                    <?php if (isset($userData) && $userData) : ?>
                    <div class="d-flex gap-5">
                        <h6>Email: <?= esc($userData['Email']); ?></h6>
                    </div>
                    <div class="d-flex gap-5">
                        <h6>Nama: <?= esc($userData['Nama']); ?></h6>
                    </div>
                    <div class="d-flex gap-5">
                        <h6>Alamat: <?= esc($userData['Alamat']); ?></h6>
                    </div>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col">
                <h3 class="text-center">ISI DATA DIRI</h3>
                <form action="<?= base_url('/update-profile'); ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp"
                            value="<?= esc($userData['Nama'] ?? ''); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="<?= esc($userData['Alamat'] ?? ''); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>