<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Jendela Wisata<span>Tourism Information</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="<?= base_url('user/event'); ?>" class="nav-link">Event</a></li>
                <li class="nav-item"><a href="<?= base_url('user/tempat_wisata'); ?>" class="nav-link">Destination</a></li>
                <li class="nav-item"><a href="<?= base_url('user/akomodasi'); ?>" class="nav-link">Akomodasi</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item">
                    <?php if ($this->session->userdata('username')) : ?>
                        <!-- <p>Halo, <?= $this->session->userdata('username') ?>! Anda sudah login.</p> -->
                        <a href="<?= base_url('c_auth/logout') ?>" class="nav-link">Logout</a>
                    <?php else : ?>
                        <a href="<?= base_url('c_auth') ?>" class="nav-link">Login</a>
                    <?php endif; ?>
                </li>

            </ul>
        </div>
    </div>
</nav>