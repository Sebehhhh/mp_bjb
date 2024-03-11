<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Video Start-->
<div class="container py-5">
    <h1 class="mb-4">#Video</h1>
    <div class="row g-4">
        <?php foreach ($videoItems as $videoItem) { ?>
            <div class="col-md-12 mb-1">
                <div class="row align-items-center">
                    <div class="col-md-11">
                        <h4><?= $videoItem['title']; ?></h4>
                        <p>
                            <a href="<?= $videoItem['link']; ?>" target="_blank">Tonton Video, klik disini!</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Video End-->

<?= $this->endSection() ?>