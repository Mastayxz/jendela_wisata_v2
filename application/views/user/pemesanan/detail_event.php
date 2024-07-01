<?php $this->load->view('landing/header') ?>
<link rel="stylesheet" href="<?= base_url('public/css/design.css'); ?>">
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-7">
            <?php if (!empty($event)) : ?>
                <!-- Alert Informasi dan Tombol Kembali -->
                <div class="alert alert-info">
                    <a href="<?= base_url('user/event'); ?>" class="btn btn-secondary mb-2">Kembali</a>
                    <strong>Info:</strong> Silakan isi formulir di bawah ini untuk melakukan pemesanan.
                </div>

                <!-- Detail event$event dan Formulir Pemesanan -->
                <div class="card rounded shadow-sm p-4">
                    <h2>Detail Pemesanan</h2>
                    <!-- <p>Nama Event: <?= $event['nama_event']; ?></p>
                    <p>Alamat: <?= $event['alamat_event']; ?></p> -->
                    <!-- Formulir Pemesanan -->
                    <form id="form-pemesanan" action="<?= base_url('user/pemesanan/pesan_event'); ?>" method="post">
                        <input type="hidden" name="id_event" value="<?= $event['id_event']; ?>">
                        <input type="hidden" name="jenis_pesanan" value="event">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="email">No Telepon:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['tlp_user'] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pemesanan">Tanggal Kunjungan:</label>
                            <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_orang">Jumlah Orang:</label>
                            <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" min="1" value="1" onchange="hitungTotalHarga()" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="setuju" name="setuju" onchange="checkAgreement()" required>
                            <label class="form-check-label" for="setuju">Saya setuju dengan ketentuan yang berlaku</label>
                        </div>
                    </form>
                </div>
            <?php else : ?>
                <p>Tidak ada detail pemesanan yang tersedia.</p>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <div class="mt-5 price-container shadow">
                <div class="harga p-3">
                    <img src="<?= base_url('/upload/event/' . $event['gambar_event1']); ?>" alt="" class="image" style="height: 10vh; width:100px;">
                    <h4 class="fw-bold mt-3">Price</h4>
                    <p id="harga-event$event">Rp.<?= number_format($event['biaya_event']); ?></p>
                    <p class="fw-bold"><?= $event['nama_event']; ?></p>
                    <!-- <p><?= $event['alamat_event']; ?></p> -->
                    <p>Tiket Teresia : <?= $event['stok_tiket']; ?></p>
                    <!-- Informasi tambahan -->
                    <hr>

                    <p class="mb-1">Tanggal Kunjungan:<span id="info-tanggal"></span></p>
                    <p class="mb-1"><strong>Jumlah Orang:</strong> <span id="info-jumlah-orang">1</span></p>
                    <p class="mb-1"><strong>Total Harga:</strong> <span id="total-harga">Rp.<?= number_format($event['biaya_event']); ?></span></p>
                    <hr>
                    <!-- Tombol Pemesanan dari Harga -->
                    <button type="button" class="btn btn-primary w-100 mt-3" id="btn-harga" onclick="submitForm()" disabled>Pesan dari Harga</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkAgreement() {
        var checkbox = document.getElementById('setuju');
        var btnHarga = document.getElementById('btn-harga');

        btnHarga.disabled = !checkbox.checked;
    }

    function hitungTotalHarga() {
        var jumlahOrang = document.getElementById('jumlah_orang').value;
        var hargaevent$event = <?= $event['biaya_event']; ?>;
        var totalHarga = jumlahOrang * hargaevent$event;

        document.getElementById('total-harga').textContent = 'Rp.' + totalHarga.toLocaleString();
        document.getElementById('info-jumlah-orang').textContent = jumlahOrang;
    }

    function submitForm() {
        var tanggal = document.getElementById('tanggal_pemesanan').value;
        document.getElementById('info-tanggal').textContent = tanggal;

        document.getElementById('form-pemesanan').submit();
    }
</script>

<?php $this->load->view('landing/footer') ?>