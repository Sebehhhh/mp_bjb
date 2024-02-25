<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BJB Festival | Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('asset/lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('asset/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('asset/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('asset/css/style.css') ?>" rel="stylesheet">

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-light navbar-expand-xl">
                <a href="#" class="navbar-brand">
                    <h1 class="text-primary display-6">Marketplace Ramadhan</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">Calendar</a>
                        <a href="#" class="nav-item nav-link">Location</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <a href="#" class="position-relative me-4 my-auto">
                            <i class="fa fa-comment fa-2x"></i>
                        </a>
                        <a href="#" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                        </a>
                        <a href="<?= base_url('/login'); ?>" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

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

                                    <?php

                                    for ($i = 0; $i < 8; $i++) : ?>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img square-menu mt-1 mb-1 mx-1">
                                                    <img src="<?= base_url('asset/img/food.jpg'); ?>" class="img-fluid w-100 rounded-top " alt="">
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
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- News End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">Banjarbaru Festival Ramadhan</h1>
                            <p class="text-secondary mb-0">2024</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-9 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why Visit Banjarbaru Ramadhan Fest?</h4>
                        <p class="mb-4">Experience the unique charm of Banjarbaru Ramadhan Fest, where you'll find a variety of cultural delights and traditional treats. Join us in celebrating the spirit of Ramadan with captivating performances, delicious cuisine, and vibrant market stalls. Don't miss out on this unforgettable cultural experience!</p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Features</h4>
                        <a class="btn-link" href="#">Home</a>
                        <a class="btn-link" href="#">calendar</a>
                        <a class="btn-link" href="#">Location</a>
                        <a class="btn-link" href="#">Contact</a>
                        <a class="btn-link" href="#">Chat</a>
                        <a class="btn-link" href="#">Cart</a>
                        <a class="btn-link" href="#">Account</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img src="<?= base_url('asset/img/payment.png'); ?>" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Banjarbaru Festival Ramadhan</a>, All right reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('asset/lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('asset/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('asset/lib/lightbox/js/lightbox.min.js') ?>"></script>
    <script src="<?= base_url('asset/lib/owlcarousel/owl.carousel.min.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('asset/js/main.js') ?>"></script>

</body>

</html>