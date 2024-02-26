<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-light">Welcome To</h4>
                <h1 class="mb-5 display-3 text-light">Banjarbaru Ramadhan Festival 2024</h1>

            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <div class="square-wrapper">
                                <img src="<?= base_url('asset/img/food.jpg'); ?>" class="img-fluid rounded" alt="First slide">
                            </div>
                            <a href="#" class="btn px-4 py-2 text-white rounded">Food</a>
                        </div>
                        <div class="carousel-item rounded">
                            <div class="square-wrapper">
                                <img src="<?= base_url('asset/img/drink.jpg'); ?>" class="img-fluid rounded" alt="Second slide">
                            </div>
                            <a href="#" class="btn px-4 py-2 text-white rounded">Drink</a>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Food Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-100 py-3 px-4 rounded-pill" type="text" placeholder="Search">
                    <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 0%;">Submit Now</button>
                </div>
                <div class="col-lg-4 text-start">
                    <h1>Food Product</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill" href="<?= base_url('detail'); ?>">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">

                                <?php
                                for ($i = 0; $i < 8; $i++) : ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3">

                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img square-menu mt-1 mb-1 mx-1">
                                                <img src="<?= base_url('asset/img/food.jpg'); ?>" class="img-fluid w-100 rounded-top" alt="">
                                            </div>

                                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Food</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4><b class="text-light">Soto Banjar</b></h4>
                                                <!-- <p>Sup kental berbumbu rempah dari Banjarmasin, Kalimantan Selatan, dengan daging dan bahan pelengkap.</p> -->
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-light fs-5 fw-bold mb-0">Price: Rp. 15.000</p>
                                                    <p class="text-light fs-5 fw-bold mb-0">Seller: Wilda Salsabila</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                <?php endfor; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Food Shop End-->

<!-- Drink Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-100 py-3 px-4 rounded-pill" type="text" placeholder="Search">
                    <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 0%;">Submit Now</button>
                </div>
                <div class="col-lg-4 text-start">
                    <h1>Drink Product</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill " data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">

                                <?php for ($i = 0; $i < 8; $i++) : ?>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative  fruite-item">
                                            <div class="fruite-img square-menu">
                                                <img src="<?= base_url('asset/img/drink.jpg'); ?>" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Food</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4><b class="text-light">Jus Lada Hitam</b></h4>
                                                <!-- <p>Sup kental berbumbu rempah dari Banjarmasin, Kalimantan Selatan, dengan daging dan bahan pelengkap.</p> -->
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-light fs-5 fw-bold mb-0">Price: Rp. 99.000</p>
                                                    <p class="text-light fs-5 fw-bold mb-0">Seller: Muhammad Seman</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Drink Shop End-->

<!-- Banner Section Start-->
<div class="container-fluid banner selected my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">Discover Ramadan Bazaar</h1>
                    <p class="fw-normal display-3 text-white mb-4">at Banjarbaru City</p>
                    <p class="mb-4 text-light">Explore a wide range of delicious foods and refreshing beverages at our marketplace during the Ramadan festival in Banjarbaru City.</p>
                    <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-light py-3 px-5">EXPLORE</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative square-wrapper">
                    <img src="<?= base_url('asset/img/fest.jpg'); ?>" class="img-fluid w-100 rounded" alt="">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

<!-- News Start-->
<div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <h1 class="mb-0">News</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            <?php for ($i = 0; $i < 8; $i++) { ?>
                <a href="<?= base_url('/news'); ?>" class="text-decoration-none">
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img square-menu">
                            <img src="<?= base_url('asset/img/news.jpg'); ?>" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">News</div>
                        <div class="p-4 rounded-bottom">
                            <h4><b class="text-light">Parsely</b></h4>
                            <p class="text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="mb-0 text-light">Author: Wilda Salsabila</p>
                                <p class="mb-0 mt-0 text-light">Date: 25 Februari 2024</p>
                            </div>
                        </div>
                    </div>
                </a>

            <?php } ?>
        </div>
    </div>
</div>
<!-- News End -->

<?= $this->endSection() ?>