<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <!-- Logo -->
        <div class="row justify-content-center mb-3">
            <div class="col-md-2 text-center">
                <img src="<?= base_url('asset/img/logo.jpg'); ?>" alt="Logo" class="img-fluid rounded" height="1200px" width="160">

            </div>
        </div>
        <!-- Form Pencarian -->
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="#" method="GET" class="d-flex">
                    <input type="text" name="search" placeholder="Cari sesuatu..." class="form-control me-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
        <!-- Form Pencarian End -->
        <!-- Card kecil -->
        <div class="row justify-content-center align-items-center">
            <div class="col-md-3"></div>
            <div class="col-md-6 d-flex justify-content-between">
                <div class="col-md-3">
                </div>
                <div class="col-md-2 mx-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-calendar-date fs-2 text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mx-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-chat-left-dots fs-2 text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mx-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-geo-alt fs-2 text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <!-- Card kecil End -->

    </div>
</div>



<!-- Hero End -->

<!-- Food Start-->
<div class="container-fluid vesitable py-1">
    <div class="container py-1">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0"><b>Exhibitor: Pasar Wadai Juara</b></h5>
            <a href="<?= base_url('/allProducts'); ?>" class="btn btn-primary">View All</a> <!-- Tautan View All -->
        </div>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            <?php foreach ($products as $product) : ?>
                <div class="item">
                    <a href="#" class="text-decoration-none">
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img square-menu">
                                <!-- Mengambil gambar produk dari direktori public -->
                                <img src="<?= base_url('uploads/products/' . $product['picture']); ?>" alt="<?= $product['name']; ?>">
                            </div>
                            <!-- Gunakan class bg-primary untuk menampilkan bahwa ini adalah produk -->
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;"><?= $product['cat_name']; ?></div>
                            <div class="p-4 rounded-bottom">
                                <h4><b class="text-light" style="font-size: 12px;"><?= $product['name']; ?></b></h4>
                                <p class="mb-0 text-light" style="font-size: 8px;">Price: <?= $product['price']; ?></p>
                                <p class="mb-0 text-light" style="font-size: 8px;">Seller: <?= $product['seller_name']; ?></p>
                                <!-- Anda bisa menambahkan informasi lainnya tentang produk di sini -->
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- Food End -->

<!-- News Start-->
<div class="container-fluid vesitable py-1">
    <div class="container py-1">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0"><b>Berita</b></h5>
            <!-- <a href="<?= base_url('/allNews'); ?>" class="btn btn-primary">View All</a> Tautan View All -->
        </div>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            <?php foreach ($news as $newsItem) : ?>
                <div class="item">
                    <a href="<?= base_url('/news?id=' . $newsItem['id']); ?>" class="text-decoration-none">
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img square-menu">
                                <!-- Mengambil gambar berita dari direktori public -->
                                <img src="<?= base_url('uploads/news/' . $newsItem['picture']); ?>" alt="<?= $newsItem['title']; ?>">
                            </div>
                            <!-- Gunakan class bg-primary untuk menampilkan bahwa ini adalah berita -->
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">News</div>
                            <div class="p-4 rounded-bottom">
                                <h4><b class="text-light" style="font-size: 12px;"><?= $newsItem['title']; ?></b></h4>
                                <!-- <p class="mb-0 text-light"><?= $newsItem['content']; ?></p> -->
                                <p class="mb-0 text-light" style="font-size: 8px;">Author: <?= $newsItem['user_name']; ?></p>
                                <!-- Anda bisa menambahkan informasi lainnya tentang berita di sini -->
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- News End -->



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



<?= $this->endSection() ?>