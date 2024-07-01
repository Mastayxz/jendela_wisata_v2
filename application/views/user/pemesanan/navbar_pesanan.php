<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Pesanan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?php echo $step === 1 ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url('user/pemesanan/step1'); ?>">Step 1</a>
            </li>
            <li class="nav-item <?php echo $step === 2 ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url('user/pemesanan/step2'); ?>">Step 2</a>
            </li>
        </ul>
    </div>
</nav>