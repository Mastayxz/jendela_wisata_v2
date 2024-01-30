<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">Jendela Wisata<span>Tourism Information</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item <?php echo ($this->uri->segment(1) == 'homecontrol') ? 'active' : ''; ?>">
                    <a href="<?= base_url('homecontrol') ?>" class="nav-link">Home</a>
                </li>

                <li class="nav-item <?php echo ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == 'event') ? 'active' : ''; ?>"><a href="<?= base_url('user/event'); ?>" class="nav-link">Event</a></li>

                <li class="nav-item <?php echo ($this->uri->segment(1) == 'user' && ($this->uri->segment(2) == 'tempat_wisata' || $this->uri->segment(2) == 'tempat_wisata/detail')) ? 'active' : ''; ?>"><a href="<?= base_url('user/tempat_wisata'); ?>" class="nav-link">Destination</a></li>

                <li class="nav-item <?php echo ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == 'akomodasi') ? 'active' : ''; ?>"><a href="<?= base_url('user/akomodasi'); ?>" class="nav-link">Accommodation</a></li>

                <li class="nav-item <?php echo ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == 'wishlist') ? 'active' : ''; ?>"><a href="<?= base_url('user/wishlist'); ?>" class="nav-link">Wishlist</a></li>

                <li class="nav-item <?php echo ($this->uri->segment(1) == 'c_hubungi' && $this->uri->segment(2) == 'index') ? 'active' : ''; ?>"><a href="<?= base_url('c_hubungi/index') ?>" class="nav-link">Contact</a></li>

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