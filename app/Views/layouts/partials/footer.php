<div class="mobile-navbar">
    <ul>
        <li class="list <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'active' : ''; ?>">
            <a href="<?= base_url('/'); ?>">
                <span class="icon">
                    <ion-icon name="home-outline" class="text-light"></ion-icon>
                </span>
                <strong> <span class="text-light">Home</span></strong>
            </a>
        </li>
        <li class="list <?php echo (strpos($_SERVER['REQUEST_URI'], '/allProducts') !== false) ? 'active' : ''; ?>">
            <a href="<?= base_url('/allProducts'); ?>">
                <span class="icon">
                    <ion-icon name="bag-handle-outline" class="text-light"></ion-icon>
                </span>
                <strong><span class="text-light">Exhibitor</span></strong>
            </a>
        </li>
        <li class="list <?php echo ($_SERVER['REQUEST_URI'] == '/login') ? 'active' : ''; ?>">
            <a href="<?= base_url('login'); ?>">
                <span class="icon">
                    <ion-icon name="log-in-outline" class="text-light"></ion-icon>
                </span>
                <strong><span class="text-light">Login</span></strong>
            </a>
        </li>
    </ul>
</div>