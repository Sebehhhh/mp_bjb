<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Contact</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Contact</li>
    </ol>
</div>
<!-- Single Page Header End -->

<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div id="calendar">

                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>