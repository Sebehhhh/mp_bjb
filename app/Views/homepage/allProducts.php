<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">All Products</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">All Products</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">All Products</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-xl-3">

                    </div>
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <select class="form-select form-select-lg p-3">
                                <option value="">All Sellers</option>
                                <option value="seller1">Seller 1</option>
                                <option value="seller2">Seller 2</option>
                                <option value="seller3">Seller 3</option>
                            </select>
                            <span class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <select class="form-select form-select-lg p-3">
                                <option value="">All Categories</option>
                                <option value="fruits">Fruits</option>
                                <option value="vegetables">Vegetables</option>
                                <option value="meat">Meat</option>
                            </select>
                            <span class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>

                </div>
                <div class="row g-4 mt-5">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Seller</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="<?= base_url('seller'); ?>"><i class="fas fa-apple-alt me-2"></i>Wilda Salsabila</a>
                                                <span>(3)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                            <div class="row">
                                <?php for ($i = 0; $i < 9; $i++) { ?>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="<?= base_url('asset/img/food.jpg'); ?>" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4 class="text-light">Soto Banjar</h4>
                                                <p class="text-light mb-0 mt-0">Price: Rp. 15.000</p>
                                                <p class="text-light mb-0 mt-0">Seller: Wilda Salsabila</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>


                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    <a href="#" class="rounded">&laquo;</a>
                                    <a href="#" class="active rounded">1</a>
                                    <a href="#" class="rounded">2</a>
                                    <a href="#" class="rounded">3</a>
                                    <a href="#" class="rounded">4</a>
                                    <a href="#" class="rounded">5</a>
                                    <a href="#" class="rounded">6</a>
                                    <a href="#" class="rounded">&raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->



<?= $this->endSection() ?>