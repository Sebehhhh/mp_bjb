<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Fruits Shop Start-->
<!-- <div class="container-fluid fruite py-5"> -->
<div class="container py-5">
    <h1 class="mb-4">All Products</h1>
    <div class="row g-4">
        <div class="col-lg-12">
            <!-- app/Views/search_form.php -->

            <form action="<?= base_url('allProducts') ?>" method="get">
                <div class="row g-4">
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="text" name="keyword" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <select name="seller" class="form-select p-3">
                                <option value="">All Sellers</option>
                                <?php foreach ($sellers as $seller) : ?>
                                    <option value="<?= $seller['id'] ?>"><?= $seller['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <select name="category" class="form-select p-3">
                                <option value="">All Categories</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <button type="submit" class="btn btn-primary w-100 mx-auto d-flex button-center">Submit</button>
                    </div>
                </div>
            </form>

            <div class="row g-4 mt-5">
                <div class="col-lg-12">
                    <div class="row g-4 justify-content-center">
                        <div class="row">
                            <?php foreach ($products as $product) { ?>
                                <div class="col-md-6 col-lg-6 col-xl-3 col-6 mb-2" onclick="showModal2('<?= $product['seller_name']; ?>', '<?= $product['seller_picture']; ?>')">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="<?= base_url('uploads/products/' . $product['picture']); ?>" class="img-fluid w-100 rounded-top" alt="<?= $product['name']; ?>">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?= $product['category_name']; ?></div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4 class="text-light" style="font-size: 12px;"><?= $product['name']; ?></h4>
                                            <p class="text-light mb-0 mt-0" style="font-size: 8px;">Price: Rp. <?= $product['price']; ?></p>
                                            <p class="text-light mb-0 mt-0" style="font-size: 8px;">Seller: <?= $product['seller_name']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Modal -->
                            <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="productModalLabel">Detail Stand</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="" id="seller_picture" class="img-fluid" alt="Seller Picture">
                                            <p id="seller"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-12 mb-5">
                            <div class="pagination d-flex justify-content-center mt-5 mb-5">
                                <?= $pager->links() ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
<!-- Fruits Shop End-->



<?= $this->endSection() ?>