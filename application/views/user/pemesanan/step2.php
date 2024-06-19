<?php $this->load->view('landing/header') ?>

<div class="container mt-4">
    <?php if (isset($pesanan_akomodasi) && isset($pesanan_akomodasi['id_pemesanan'])) : ?>
        <div class="alert alert-success">
            <h4 class="alert-heading">Pemesanan Akomodasi Berhasil!</h4>
            <p>Terima kasih telah melakukan pemesanan akomodasi. Berikut adalah detail pemesanan Anda:</p>
            <hr>
            <div class="invoice">
                <h5>Invoice Akomodasi</h5>
                <p><strong>ID Pemesanan:</strong> <?= $pesanan_akomodasi['id_pemesanan']; ?></p>
                <p><strong>Nama Pengguna:</strong> <?= $pesanan_akomodasi['id_user']; ?></p>
                <!-- Tambahkan detail lainnya sesuai dengan tabel pesanan akomodasi -->
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($pesanan_destinasi) && isset($pesanan_destinasi['id_pemesanan'])) : ?>
        <div class="alert alert-success">
            <h4 class="alert-heading">Pemesanan Destinasi Berhasil!</h4>
            <p>Terima kasih telah melakukan pemesanan destinasi. Berikut adalah detail pemesanan Anda:</p>
            <hr>
            <div class="invoice">
                <h5>Invoice Destinasi</h5>
                <p><strong>ID Pemesanan:</strong> <?= $pesanan_destinasi['id_pemesanan']; ?></p>
                <p><strong>Nama Pengguna:</strong> <?= $pesanan_destinasi['id_user']; ?></p>
                <!-- Tambahkan detail lainnya sesuai dengan tabel pesanan destinasi -->
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($pesanan_event) && isset($pesanan_event['id_pemesanan'])) : ?>
        <div class="alert alert-success">
            <h4 class="alert-heading">Pemesanan Event Berhasil!</h4>
            <p>Terima kasih telah melakukan pemesanan event. Berikut adalah detail pemesanan Anda:</p>
            <hr>
            <div class="invoice">
                <h5>Invoice Event</h5>
                <p><strong>ID Pemesanan:</strong> <?= $pesanan_event['id_pemesanan']; ?></p>
                <p><strong>Nama Pengguna:</strong> <?= $pesanan_event['id_user']; ?></p>
                <!-- Tambahkan detail lainnya sesuai dengan tabel pesanan event -->
            </div>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('user/tempat_wisata'); ?>" class="btn btn-primary">Kembali ke Tempat Wisata</a>
</div>

<?php $this->load->view('landing/footer') ?>