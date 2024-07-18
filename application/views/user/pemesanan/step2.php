<?php $this->load->view('landing/header') ?>
<div class="container py-5">
    <h2 class="mb-4 text-center">Step 2: Pembayaran</h2>

    <!-- Tampilkan data pemesanan -->
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body">
            <div class="alert alert-info d-flex justify-content-between align-items-center">
                <div>
                    <strong>Info:</strong> Silakan isi formulir di bawah ini untuk melakukan pemesanan.
                </div>
                <a href="<?= base_url('user/tempat_wisata'); ?>" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-header bg-primary text-white text-center py-3 rounded-top">
                <h4>Detail Pemesanan</h4>
            </div>
            <div class="card-body">
                <p><strong>Nama Pemesan:</strong> <?= $user['nama'] ?></p>
                <p><strong>No Telpon:</strong> <?= $user['tlp_user'] ?></p>

                <?php if ($jenis_pesanan == 'event' && isset($pemesanan)) : ?>
                    <p><strong>Nama Event:</strong> <?= $event['nama_event'] ?></p>
                    <p><strong>Tanggal Kunjungan:</strong> <?= date('F j, Y', strtotime($pemesanan['tanggal_pemesanan'])); ?></p>
                    <p><strong>Jumlah Orang:</strong> <?= $pemesanan['jumlah_orang'] ?></p>
                    <p><strong>Total Harga:</strong> Rp. <?= number_format($pemesanan['total_harga']) ?></p>
                <?php elseif ($jenis_pesanan == 'akomodasi' && isset($pemesanan)) : ?>
                    <p><strong>Nama Akomodasi:</strong> <?= $akomodasi['nama_akomodasi'] ?></p>
                    <p><strong>Jumlah Kamar:</strong> <?= $pemesanan['jumlah_kamar'] ?></p>
                    <p><strong>Tanggal Kunjungan:</strong> <?= $pemesanan['check_in'] ?></p>
                    <p><strong>Total Harga:</strong> Rp. <?= number_format($pemesanan['total_harga']) ?></p>
                <?php elseif ($jenis_pesanan == 'destinasi' && isset($pemesanan)) : ?>
                    <p><strong>Nama Destinasi:</strong> <?= $destinasi['nama_tempat_wisata'] ?></p>
                    <p><strong>Tanggal Kunjungan:</strong> <?= date('F j, Y', strtotime($pemesanan['tanggal_pemesanan'])); ?></p>
                    <p><strong>Jumlah Orang:</strong> <?= $pemesanan['jumlah_orang'] ?></p>
                    <p><strong>Total Harga:</strong> Rp. <?= number_format($pemesanan['total_harga']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Form untuk memilih metode pembayaran -->

    <!-- Button Bayar -->
    <?php if ($jenis_pesanan && $pemesanan) : ?>
        <div class="mt-4 text-center">
            <!-- Menggunakan JavaScript untuk membuka halaman pembayaran -->
            <button type="button" class="btn btn-success btn-lg" onclick="openDuitkuPayment()">Bayar</button>
            <a href="<?= base_url('user/pemesanan/cancel/' . $jenis_pesanan . '/' . $id_pesanan) ?>" class="btn btn-danger btn-lg ml-2">Cancel</a>
        </div>
    <?php endif; ?>
</div>

<script>
    function openDuitkuPayment() {
        window.location.href = "<?= base_url('user/pemesanan/proses_pembayaran/' . $jenis_pesanan . '/' . $id_pesanan) ?>";
    }
</script>

<?php $this->load->view('landing/footer') ?>