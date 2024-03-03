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
                                <li><a href="">Product Category</a></li>
                                <li><a href="">Seller</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu ">
                    <a href=""><i class="mdi mdi-calendar-clock"></i>Users</a>
                </li>

                <li class="has-submenu ">
                    <a href=""><i class="mdi mdi-calendar-clock"></i>Products</a>
                </li>

            </ul><!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div> <!-- end navbar-custom -->