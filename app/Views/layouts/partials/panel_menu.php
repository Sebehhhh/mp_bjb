<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu text-center">

                <li class="has-submenu ">
                    <a href="<?= base_url('dashboard'); ?>"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="mdi mdi-layers"></i>Master Data</a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="<?= base_url('panel/cat_news'); ?>">News category</a></li>
                                <li><a href="<?= base_url('panel/cat_product'); ?>">Product Category</a></li>
                                <li><a href="<?= base_url('panel/seller'); ?>">Seller</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu ">
                    <a href="<?= base_url('panel/users'); ?>"><i class="mdi mdi-account-box-outline"></i>Users</a>
                </li>
                <li class="has-submenu ">
                    <a href="<?= base_url('panel/news'); ?>"><i class="mdi mdi-newspaper"></i>News</a>
                </li>
                <li class="has-submenu ">
                    <a href="<?= base_url('panel/product'); ?>"><i class="mdi mdi-food"></i>Products</a>
                </li>
                <li class="has-submenu ">
                    <a href="<?= base_url('panel/event'); ?>"><i class="mdi mdi-calendar-check"></i>Event</a>
                </li>
                <li class="has-submenu ">
                    <a href="<?= base_url('panel/video'); ?>"><i class="mdi mdi-video"></i>Video</a>
                </li>

            </ul><!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div> <!-- end navbar-custom -->