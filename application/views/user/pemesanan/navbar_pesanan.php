<nav aria-label="breadcrumb container">
    <ol class="breadcrumb bg-light p-3 rounded shadow-sm">
        <li class="breadcrumb-item <?= $step == 1 ? 'active' : '' ?>">
            <span class="badge badge-primary <?= $step == 1 ? '' : 'invisible' ?>">1</span>
            <a href="#" class="<?= $step == 1 ? 'text-primary' : '' ?>">Step 1: Pemesanan</a>
        </li>
        <li class="breadcrumb-item <?= $step == 2 ? 'active' : '' ?>">
            <span class="badge badge-primary <?= $step == 2 ? '' : 'invisible' ?>">2</span>
            <a href="#" class="<?= $step == 2 ? 'text-primary' : '' ?>">Step 2: Pembayaran</a>
        </li>
    </ol>
</nav>