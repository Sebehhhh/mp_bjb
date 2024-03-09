<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Single Product Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">

                    <div class="col-lg-6">
                        <?php if (!empty($newsItem)) : ?>
                            <img src="<?= base_url('uploads/news/' . $newsItem['picture']); ?>" alt="<?= $newsItem['title']; ?>" class="img-fluid mb-4">
                            <h4 class="fw-bold mb-3"><?= $newsItem['title']; ?></h4>
                            <h6 class="mb-4"><?= $newsItem['content']; ?></h6>
                            <p class="mb-1">Author: <?= $newsItem['author']; ?></p>
                            <p class="mb-1">Published: <?= $newsItem['created_at']; ?></p>

                        <?php else : ?>
                            <p class="text-danger">Data berita tidak ditemukan.</p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->


<?= $this->endSection() ?>