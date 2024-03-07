<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- News Start-->
<!-- <div class="container-fluid news py-5"> -->
<div class="container py-5">
    <h1 class="mb-4">All News</h1>
    <div class="row g-4">
        <div class="col-lg-12">

            <div class="row g-4">

                <div class="col-lg-12">
                    <div class="row g-4 justify-content-center">
                        <?php foreach ($allNews as $newsItem) { ?>
                            <div class="col-md-6 col-lg-6 col-xl-3 col-6 mb-2"> <!-- Ubah col-12 menjadi col-6 untuk menunjukkan 2 kolom per baris pada layar kecil -->
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <!-- Menggunakan gambar berita yang sesuai -->
                                        <img src="<?= base_url('uploads/news/' . $newsItem['picture']); ?>" class="img-fluid w-100 rounded-top" alt="<?= $newsItem['title']; ?>">
                                    </div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4 class="text-light" style="font-size: 12px;"><?= $newsItem['title']; ?></h4>
                                        <p class="text-light mb-0 mt-0" style="font-size: 8px;"><?= $newsItem['content']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
<!-- </div> -->
<!-- News End-->

<?= $this->endSection() ?>