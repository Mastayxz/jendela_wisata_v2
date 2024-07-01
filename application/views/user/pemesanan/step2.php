<?php $this->load->view('landing/header') ?>
<div class="container">
    <h2>Step 2: Pembayaran</h2>

    <!-- Tampilkan data pemesanan -->
    <div class="card">
        <div class="alert alert-info">
            <a href="<?= base_url('user/tempat_wisata'); ?>" class="btn btn-secondary mb-2">Kembali</a>
            <strong>Info:</strong> Silakan isi formulir di bawah ini untuk melakukan pemesanan.
        </div>
        <div class="card-header">
            <h4>Detail Pemesanan</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama Pemesan:</strong> <?= $user['nama'] ?></p>
            <p><strong>No Telpon:</strong> <?= $user['tlp_user'] ?></p>

            <?php if ($jenis_pesanan == 'event' && isset($event)) : ?>
                <p><strong>Nama Event:</strong> <?= $event['nama_event'] ?></p>
            <?php elseif ($jenis_pesanan == 'akomodasi' && isset($akomodasi)) : ?>
                <p><strong>Nama Akomodasi:</strong> <?= $akomodasi['nama_akomodasi'] ?></p>
            <?php elseif ($jenis_pesanan == 'destinasi' && isset($destinasi)) : ?>
                <p><strong>Nama Destinasi:</strong> <?= $destinasi['nama_tempat_wisata'] ?></p>
            <?php endif; ?>
            <p><strong>Tanggal Kunjungan:</strong> <?= date('F j, Y', strtotime($tanggal_kunjungan)); ?></p>
            <p><strong>Jumlah Orang:</strong> <?= $jumlah_orang ?></p>
            <p><strong>Total Harga:</strong> Rp. <?= number_format($total_harga) ?></p>
        </div>
    </div>

    <!-- Form untuk memilih metode pembayaran -->
    <form action="<?= base_url('user/pemesanan/proses_pembayaran') ?>" method="post" class="mt-4">
        <div class="form-group">
            <label for="metode_pembayaran">Pilih Metode Pembayaran</label>
            <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
                <?php foreach ($metode_pembayaran as $metode) : ?>
                    <option value="<?= $metode['id_metode'] ?>"><?= $metode['nama_metode'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Button Bayar -->
        <?php if ($jenis_pesanan && $id_pesanan) : ?>
            <div class="mt-4">
                <!-- Menggunakan JavaScript untuk membuka popup -->
                <button type="button" class="btn btn-success" onclick="openDuitkuPayment()">Bayar</button>
                <a href="<?= base_url('user/pemesanan/cancel/' . $jenis_pesanan . '/' . $id_pesanan) ?>" class="btn btn-danger ml-2">Cancel</a>
            </div>
        <?php endif; ?>
    </form>
</div>

<!-- JavaScript untuk membuka popup -->
<script>
    function openDuitkuPayment() {
        // Ganti URL berikut dengan URL yang mengarah ke halaman pembayaran Duitku
        var duitkuPaymentUrl = "https://payment.duitku.com/invoice/";
        // Ubah sesuai dengan parameter yang diperlukan, seperti ID pemesanan, jumlah pembayaran, dll.
        // Contoh: duitkuPaymentUrl += "?order_id=<?= $id_pesanan ?>&amount=<?= $total_harga ?>";

        // Buka popup atau modal
        window.open(duitkuPaymentUrl, "_blank", "width=600,height=400");
    }
</script>