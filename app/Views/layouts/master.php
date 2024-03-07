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

    <!-- Calendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

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


    <?= $this->include('layouts/partials/header') ?>

    <div id="content">
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('layouts/partials/footer') ?>

    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-secondary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a> -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        function showModal(seller, sellerPicture) {
            document.getElementById('seller').innerText = 'Seller: ' + seller;
            document.getElementById('sellerPicture').src = '<?= base_url("uploads/sellers/") ?>' + sellerPicture;
            $('#productModal').modal('show');
        }
    </script>


    <script>
        $(document).ready(function() {
            $(".mobile-navbar .list").click(function(event) {
                event.preventDefault(); // Mencegah perilaku default dari link

                $(".mobile-navbar .list").removeClass("active");
                $(this).addClass("active");

                // Perpindahan halaman atau tindakan lainnya
                var url = $(this).find("a").attr("href");
                // Lakukan perpindahan halaman dengan menggunakan URL dari tautan yang diklik
                window.location.href = url;
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (session()->has('alert')) : ?>
        <script>
            Swal.fire({
                icon: '<?= session('alert.type') ?>',
                title: '<?= session('alert.title') ?>',
                text: '<?= session('alert.message') ?>',
            });
        </script>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>

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