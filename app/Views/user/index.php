<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>

<div class="container-fluid p-2 index-slide">
    <div class="marquee">
        <div class="marquee-content">
            <!-- Content Block 1 -->
            <div class="content-block">
                <a href="https://example.com/link1" target="_blank">
                    Pay Day November Disc 90% + Extra Voucher 800rb
                    <i class="fa-solid fa-greater-than mx-2" style="color: #ffffff;"></i>
                    <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/icons/ic-coffee-bean.svg"
                        alt="Coffee Bean Icon" class="ic-coffee-bean mx-2">
                </a>
            </div>

            <!-- Content Block 2 (repeat of Block 1 for  scrolling) -->
            <div class="content-block">
                <a href="https://example.com/link1" target="_blank">
                    Pay Day November Disc 90% + Extra Voucher 800rb
                    <i class="fa-solid fa-greater-than mx-2" style="color: #ffffff;"></i>
                    <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/icons/ic-coffee-bean.svg"
                        alt="Coffee Bean Icon" class="ic-coffee-bean mx-2">
                </a>
                <!-- Additional links and items can be added here -->
            </div>
            <div class="content-block">
                <a href="https://example.com/link1" target="_blank">
                    Pay Day November Disc 90% + Extra Voucher 800rb
                    <i class="fa-solid fa-greater-than mx-2" style="color: #ffffff;"></i>
                    <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/icons/ic-coffee-bean.svg"
                        alt="Coffee Bean Icon" class="ic-coffee-bean mx-2">
                </a>
                <!-- Additional links and items can be added here -->
            </div>
            <div class="content-block">
                <a href="https://example.com/link1" target="_blank">
                    Pay Day November Disc 90% + Extra Voucher 800rb
                    <i class="fa-solid fa-greater-than mx-2" style="color: #ffffff;"></i>
                    <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/icons/ic-coffee-bean.svg"
                        alt="Coffee Bean Icon" class="ic-coffee-bean mx-2">
                </a>
                <!-- Additional links and items can be added here -->
            </div>
            <div class="content-block">
                <a href="https://example.com/link1" target="_blank">
                    Pay Day November Disc 90% + Extra Voucher 800rb
                    <i class="fa-solid fa-greater-than mx-2" style="color: #ffffff;"></i>
                    <img src="https://d8g5mz6srwlcs.cloudfront.net/v3.59.0/icons/ic-coffee-bean.svg"
                        alt="Coffee Bean Icon" class="ic-coffee-bean mx-2">
                </a>
                <!-- Additional links and items can be added here -->
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="mt-5 d-flex justify-content-between  promo-section">
        <h3>Promo Menarik Untukmu</h3>
        <a href="/promo">
            Lihat Semua
        </a>
    </div>
    <div class="btn-promo mt-3 d-flex  gap-3">
        <div class=""><button class=" btn-filter btn btn-success">Semua</button></div>
        <div class=""><button class="btn-filter btn btn-success">Promo Bulan Ini</button></div>
    </div>
    <div id="carouselExampleAutoplaying" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/corousel/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/corousel/2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/corousel/3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/corousel/4.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="ach d-flex justify-content-center mt-5 align-items-center gap-3 rounded p-3">
        <img height="50" src="https://asset.ottenstatic.com/e-commerce/images/australian_international_coffee.png"
            alt="" class="p-0 m-0">
        <h6 class="fw-bold p-0 m-0">2022 International Award Winning Coffee</h6>
    </div>

    <div class="user-rec mt-4 d-flex justify-content-between align-items-center shadow-sm  rounded p-4">
        <div class="u-left gap-3 d-flex align-items-center">
            <img class="50" src="https://dl54du30pg39i.cloudfront.net/e-commerce/images/cara-ngopi-01.svg" alt="">
            <div class="u-content">
                <p class="p-0 m-0">Hey Ulil Abshar</p>
                <h5 class="fw-bold p-0 m-0 mt-2">Pilih Pengalaman Ngopimu</h5>

            </div>
        </div>
        <div class="u-right d-flex gap-5">
            <a class="menu  d-flex flex-column align-items-center text-center " href="">
                <img width="50" src="https://asset.ottenstatic.com/e-commerce/icons/ic-event.png" alt="">
                <p class="text-black fw-bold mt-2 m-0 p-0">Ikut Event</p>
            </a>
            <a class="menu  d-flex flex-column align-items-center text-center " href="">
                <img width="50" src="https://asset.ottenstatic.com/e-commerce/icons/ic-event.png" alt="">
                <p class="text-black fw-bold mt-2 m-0 p-0">Ikut Event</p>
            </a>
            <a class="menu  d-flex flex-column align-items-center text-center " href="">
                <img width="50" src="https://asset.ottenstatic.com/e-commerce/icons/ic-event.png" alt="">
                <p class="text-black fw-bold mt-2 m-0 p-0">Ikut Event</p>
            </a>
            <a class="menu  d-flex flex-column align-items-center text-center " href="">
                <img width="50" src="https://asset.ottenstatic.com/e-commerce/icons/ic-event.png" alt="">
                <p class="text-black fw-bold mt-2 m-0 p-0">Ikut Event</p>
            </a>

        </div>

    </div>
    <div class="fsale  rounded mt-5 border-solid">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div></div>
                <div>
                    <p>Dimulai dalam</p>
                </div>
                <div class="d-flex align-items-center">
                    <p class="">Lihat Semua</p>
                    <i class=" fa-solid fa-greater-than"></i>

                </div>
            </div>
            <div class="d-flex justify-content0-between mt-3">
                <div>
                    <img width=" 400" src="https://s-ecom.ottenstatic.com/original/6551c78f2bb96836434369.png" alt="">
                </div>
                <div class=" d-flex gap-2 ">
                    <div class="card shadow-sm" style="width: 10rem;">
                        <img src="https://s-ecom.ottenstatic.com/thumbnail/1467.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="fw-bold">Rancilio - Coffee Grinder Rocky SD</h6>
                            <p>Rp 8.050.000</p>
                            <p>Rp ?</p>
                            <hr>
                            <p>tersedia</p>
                        </div>
                    </div>
                    <div class="card shadow-sm" style="width: 10rem;">
                        <img src="https://s-ecom.ottenstatic.com/thumbnail/1467.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="fw-bold">Rancilio - Coffee Grinder Rocky SD</h6>
                            <p>Rp 8.050.000</p>
                            <p>Rp ?</p>
                            <hr>
                            <p>tersedia</p>
                        </div>
                    </div>
                    <div class="card shadow-sm" style="width: 10rem;">
                        <img src="https://s-ecom.ottenstatic.com/thumbnail/1467.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="fw-bold">Rancilio - Coffee Grinder Rocky SD</h6>
                            <p>Rp 8.050.000</p>
                            <p>Rp ?</p>
                            <hr>
                            <p>tersedia</p>
                        </div>
                    </div>
                    <div class="card shadow-sm" style="width: 10rem;">
                        <img src="https://s-ecom.ottenstatic.com/thumbnail/1467.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="fw-bold">Rancilio - Coffee Grinder Rocky SD</h6>
                            <p>Rp 8.050.000</p>
                            <p>Rp ?</p>
                            <hr>
                            <p>tersedia</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
<script src="/js/index.js"></script>
<?= $this->endSection() ?>