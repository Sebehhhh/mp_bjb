<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Seller Detail</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Seller Detail</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="<?= base_url('asset/img/stand.jpg'); ?>" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">Wilda Salsabila</h4>

                        <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                        <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
                        <h4 class="mb-4">News Latest</h4>
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded mx-3" style="width: 100px; height: 100px;">
                                    <img src="<?= base_url('asset/img/food.jpg'); ?>" class="img-fluid rounded" alt="Image">
                                </div>
                                <div>
                                    <h5 class="mb-2 fw-bold">Soto Banjar</h5>
                                    <div class="d-flex mb-2">
                                        <h5 class=" me-2">Price: Rp. 15.000</h5>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                    </div>
                </div>
            </div>
        </div>
        <h1 class="fw-bold mb-0">Related News</h1>
        <div class="vesitable">
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="<?= base_url('asset/img/stand.jpg'); ?>" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Seller</div>
                    <div class="p-4 pb-0 rounded-bottom">
                        <h4>Wilda Salsabila</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->


<?= $this->endSection() ?>