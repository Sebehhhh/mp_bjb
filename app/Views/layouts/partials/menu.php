 <!-- Navbar start -->
 <div class="container-fluid fixed-top">
     <div class="container px-0">
         <nav class="navbar navbar-light bg-light navbar-expand-xl">
             <a href="#" class="navbar-brand">
                 <h1 class="text-primary display-6">Marketplace Ramadhan</h1>
             </a>
             <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                 <span class="fa fa-bars text-primary"></span>
             </button>
             <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                 <div class="navbar-nav mx-auto">
                     <a href="<?= base_url('/'); ?>" class="nav-item nav-link <?= ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/homepage') ? 'active' : ''; ?>">Home</a>
                     <a href="<?= base_url('/allProducts'); ?>" class="nav-item nav-link <?= ($_SERVER['REQUEST_URI'] == '/allProducts' || $_SERVER['REQUEST_URI'] == '/allProducts') ? 'active' : ''; ?>">All Products</a>
                     <!-- <a href="<?= base_url('/calendar'); ?>" class="nav-item nav-link <?= ($_SERVER['REQUEST_URI'] == '/calendar') ? 'active' : ''; ?>">Calendar</a> -->
                     <a href="<?= base_url('/about'); ?>" class="nav-item nav-link <?= ($_SERVER['REQUEST_URI'] == '/about') ? 'active' : ''; ?>">About Us</a>
                 </div>

                 <div class="d-flex m-3 me-0">
                     <a href="<?= base_url('/login'); ?>" class="my-auto">
                         <h4> Login</h4>
                     </a>
                 </div>
             </div>
         </nav>
     </div>
 </div>
 <!-- Navbar End -->