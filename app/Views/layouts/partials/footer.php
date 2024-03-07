<div class="mobile-navbar">
    <ul>
        <li class="list <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'active' : ''; ?>">
            <a href="<?= base_url('/'); ?>">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="text">Home</span>
            </a>
        </li>
        <li class="list <?php echo (strpos($_SERVER['REQUEST_URI'], '/allProducts') !== false) ? 'active' : ''; ?>">
            <a href="<?= base_url('/allProducts'); ?>">
                <span class="icon">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                </span>
                <span class="text">Exhibitor</span>
            </a>
        </li>
        <li class="list <?php echo ($_SERVER['REQUEST_URI'] == '/login') ? 'active' : ''; ?>">
            <a href="<?= base_url('login'); ?>">
                <span class="icon">
                    <ion-icon name="log-in-outline"></ion-icon>
                </span>
                <span class="text">Login</span>
            </a>
        </li>
    </ul>
</div>