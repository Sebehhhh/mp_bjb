<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Urora - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
    <script src="https://kit.fontawesome.com/fd9be5d8ef.js" crossorigin="anonymous"></script>

    <!--Morris Chart CSS -->
    <link href="<?= base_url('assets/plugins/fullcalendar/vanillaCalendar.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/chartist/css/chartist.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/morris/morris.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/metro/MetroJs.min.css') ?>">

    <link href="<?= base_url('assets/plugins/carousel/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/plugins/carousel/owl.theme.default.min.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/plugins/animate/animate.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/bootstrap-material-design.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">



</head>


<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Navigation Bar-->
    <header id="topnav">

        <?= $this->include('layouts/partials/panel_header') ?>
        <?= $this->include('layouts/partials/panel_menu') ?>

    </header>


    <div id="content">
        <?= $this->renderSection('content') ?>
    </div>


    <?= $this->include('layouts/partials/panel_footer') ?>

    <?= $this->include('layouts/partials/panel_script') ?>

    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-material-design.js') ?>"></script>
    <script src="<?= base_url('assets/js/modernizr.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/detect.js') ?>"></script>
    <script src="<?= base_url('assets/js/fastclick.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.slimscroll.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.blockUI.js') ?>"></script>
    <script src="<?= base_url('assets/js/waves.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.nicescroll.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.scrollTo.min.js') ?>"></script>

    <script src="<?= base_url('assets/plugins/carousel/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/fullcalendar/vanillaCalendar.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/peity/jquery.peity.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/chartist/js/chartist.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/chartist/js/chartist-plugin-tooltip.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/metro/MetroJs.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/morris/morris.min.js') ?>"></script>
    <script src="<?= base_url('assets/pages/dashborad.js') ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>


</body>

</html>