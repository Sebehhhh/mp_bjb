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

    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>">

    <link href="<?= base_url('assets/plugins/animate/animate.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/bootstrap-material-design.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/icons.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">


</head>


<body>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="display-table">
            <div class="display-table-cell">
                <diV class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= base_url('assets/images/extra.png'); ?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center pt-3">
                                        <!-- <a href="#">
                                            <img src="<?= base_url('asset/img/pasar_wadai.png'); ?>" alt="logo" height="200px" width="300px" />
                                        </a> -->
                                    </div>
                                    <?php if (session()->has('errors')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                <?php foreach (session('errors') as $error) : ?>
                                                    <li><?= esc($error) ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    <?php endif ?>
                                    <div class="px-3 pb-3">
                                        <form class="form-horizontal m-t-20 mb-0" action="<?= base_url('act/login'); ?>" method="POST">

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="email" type="text" required="" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                                </div>
                                            </div>


                                            <div class="form-group text-right row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-raised btn-block waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group m-t-10 mb-0 row">
                                                <div class="col-sm-5 m-t-20">
                                                    <a href="<?= base_url('register'); ?>" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account ?</a>
                                                </div>
                                            </div> -->
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </diV>
            </div>
        </div>
    </div>


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

    <!-- jQuery  -->
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-material-design.js'); ?>"></script>
    <script src="<?= base_url('assets/js/modernizr.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/detect.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fastclick.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.blockUI.js'); ?>"></script>
    <script src="<?= base_url('assets/js/waves.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/js/app.js'); ?>"></script>


</body>

</html>