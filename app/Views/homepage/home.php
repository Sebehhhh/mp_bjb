<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Hero Start -->
<div class="container py-5 hero-header">
    <img src="<?= base_url('asset/img/dinas.png'); ?>" alt="Sponsored" class="sponsored-image">
    <div class="container py-5">
        <!-- Logo -->
        <div class="row justify-content-center">
            <div class="col-md-2 text-center">
                <img src="<?= base_url('asset/img/logo.png'); ?>" alt="Logo" class="img-fluid rounded" height="160px" width="220">
            </div>
        </div>
        <!-- Form Pencarian -->
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="<?= base_url('allProducts'); ?>" method="GET" class="d-flex">
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
                    <div class="card1 text-center" data-toggle="modal" data-target="#exampleModal">
                        <div class="card-body">
                            <i class="bi bi-calendar-date-fill fs-2 text-light"></i>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Daftar Acara</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $today = date('Y-m-d');
                                foreach ($events as $event) :
                                    // Bandingkan tanggal event dengan tanggal hari ini
                                    $eventDate = date('Y-m-d', strtotime($event['date']));
                                    if ($eventDate < $today) {
                                        $status = 'Sudah Lewat';
                                        $textClass = 'text-muted';
                                    } elseif ($eventDate > $today) {
                                        $status = 'Akan Datang';
                                        $textClass = 'text-primary';
                                    } else {
                                        $status = 'Sedang Berlangsung';
                                        $textClass = 'text-success';
                                    }
                                ?>
                                    <div class="event-item">
                                        <h5><?= $event['title'] ?></h5>
                                        <p class="<?= $textClass ?>">Status: <?= $status ?></p>
                                        <p class="<?= $textClass ?>">Tanggal: <?= date('d/m/Y', strtotime($event['date'])) ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 mx-2">
                    <div class="card2 text-center">
                        <div class="card-body" onclick="showModal()">
                            <i class="bi bi-camera-reels-fill fs-2 text-light"></i>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal" tabindex="-1" id="eventModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="video-container">
                                    <iframe id="youtubeVideo" src="https://www.youtube.com/embed/tlkfc_uQ8oQ?mute=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="stopVideo()">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-md-2 mx-2">
                    <div class="card3 text-center" onclick="showModal3()">
                        <div class="card-body">
                            <i class="bi bi-geo-alt-fill fs-2 text-light"></i>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Taman Murjani Banjarbaru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= base_url('asset/img/festival.jpeg'); ?>" class="img-fluid" style="width: 100%;" alt="Gambar">
                            </div>
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
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img square-menu">
                            <img src="<?= base_url('uploads/products/' . $product['picture']); ?>" alt="<?= $product['name']; ?>">
                        </div>
                        <!-- Gunakan class bg-primary untuk menampilkan bahwa ini adalah produk -->
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">A<?= $product['seller_kode']; ?></div>
                        <div class="p-4 rounded-bottom">
                            <h4><b class="text-light" style="font-size: 16px;"><?= $product['name']; ?></b></h4>
                            <p class="mb-0 text-light" style="font-size: 10px;">Price: <?= $product['price']; ?></p>
                            <p class="mb-0 text-light" style="font-size: 10px;">Seller: <?= $product['seller_name']; ?></p>
                            <!-- Anda bisa menambahkan informasi lainnya tentang produk di sini -->
                        </div>
                    </div>
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
            <a href="<?= base_url('/allNews'); ?>" class="btn btn-primary">View All</a>
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
                                <h4><b class="text-light" style="font-size: 16px;"><?= $newsItem['title']; ?></b></h4>
                                <!-- <p class="mb-0 text-light"><?= $newsItem['content']; ?></p> -->
                                <p class="mb-0 text-light" style="font-size: 10px;">Author: <?= $newsItem['user_name']; ?></p>
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
                    <h1 class="display-3 text-white">Temukan Pesona Festival Ramadan</h1>
                    <p class="fw-normal display-3 text-white mb-4">di Kota Banjarbaru</p>
                    <p class="mb-4 text-light">
                        Jelajahi beragam makanan lezat dan minuman segar di kedai kami selama festival Ramadan di Kota Banjarbaru.</p>
                    <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-light py-3 px-5">JELAJAHI</a>
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