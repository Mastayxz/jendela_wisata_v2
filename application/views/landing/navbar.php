<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Jendela Wisata<span>Tourism Information</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
<<<<<<< HEAD
            
=======
                <li class="nav-item <?php echo ($this->uri->uri_string() == 'homecontrol') ? 'active' : ''; ?>"><a href="<?= base_url('homecontrol') ?>" class="nav-link">Home</a></li>
                <li class="nav-item <?php echo ($this->uri->uri_string() == 'user/event') ? 'active' : ''; ?>"><a href="<?= base_url('user/event'); ?>" class="nav-link">Event</a></li>
                <li class="nav-item <?php echo ($this->uri->uri_string() == 'user/tempat_wisata') ? 'active' : ''; ?>"><a href="<?= base_url('user/tempat_wisata'); ?>" class="nav-link">Destination</a></li>
                <li class="nav-item <?php echo ($this->uri->uri_string() == 'user/akomodasi') ? 'active' : ''; ?>"><a href="<?= base_url('user/akomodasi'); ?>" class="nav-link">Accomodation</a></li>
                <li class="nav-item <?php echo ($this->uri->uri_string() == 'user/wishlist') ? 'active' : ''; ?>"><a href="<?= base_url('user/wishlist'); ?>" class="nav-link">wishlist</a></li>
                <li class="nav-item <?php echo ($this->uri->uri_string() == 'blog') ? 'active' : ''; ?>"><a href="blog.html" class="nav-link">Contact</a></li>

>>>>>>> 3c08fa4ead9315dc96b9bee2fe70a844c4a28542
                <li class="nav-item">
                    <?php if ($this->session->userdata('id_user')) : ?>
                        <a href="<?= base_url('user/userinfo'); ?>" class="nav-link"><i class="fa fa-user"> </i></a>
                    <?php else : ?>
                        <a href="<?= base_url('c_auth/index') ?>" class="nav-link">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>