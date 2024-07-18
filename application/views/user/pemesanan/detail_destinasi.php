<?php $this->load->view('landing/header') ?>
<!-- <?php
        // Ambil detail pemesanan dari session
        $detail_pemesanan = $this->session->userdata('detail_pemesanan');

        // Tampilkan informasi pemesanan jika ada
        if (!empty($detail_pemesanan)) {
            echo "<h3>Detail Pemesanan:</h3>";
            echo "<p>Nama: " . $detail_pemesanan['nama'] . "</p>";
            echo "<p>Tanggal: " . $detail_pemesanan['tanggal'] . "</p>";
            // Tambahkan informasi lain sesuai kebutuhan

            // Pastikan untuk membersihkan session setelah digunakan
            $this->session->unset_userdata('detail_pemesanan');
        }
        ?> -->
<link rel="stylesheet" href="<?= base_url('public/css/design.css'); ?>">
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-7">
            <?php if (!empty($destinasi)) : ?>
                <!-- Alert Informasi dan Tombol Kembali -->
                <div class="alert alert-info">
                    <a href="<?= base_url('user/tempat_wisata'); ?>" class="btn btn-secondary mb-2">Kembali</a>
                    <strong>Info:</strong> Silakan isi formulir di bawah ini untuk melakukan pemesanan.
                </div>

                <!-- Detail Destinasi dan Formulir Pemesanan -->
                <div class="card rounded shadow-sm p-4">
                    <h2>Detail Pemesanan</h2>
                    <!-- <p>Nama Tempat Wisata: <?= $destinasi['nama_tempat_wisata']; ?></p> -->
                    <!-- <p>Alamat: <?= $destinasi['alamat_tempat_wisata']; ?></p> -->
                    <!-- Formulir Pemesanan -->
                    <form id="form-pemesanan" action="<?= base_url('user/pemesanan/proses_pesan'); ?>" method="post">
                        <input type="hidden" name="id_tempat_wisata" value="<?= $destinasi['id_tempat_wisata']; ?>">
                        <input type="hidden" name="jenis_pesanan" value="destinasi">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="email">No Telepon</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['tlp_user'] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
                            <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" required>
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
                    <img src="<?= base_url('upload/destinasi/' . $destinasi['gambar1']); ?>" alt="" class="image" style="height: 10vh; width:100px;">
                    <h4 class="fw-bold mt-3">Price</h4>
                    <p id="harga-destinasi">Rp.<?= number_format($destinasi['biaya_tempat_wisata']); ?></p>
                    <p class="fw-bold"><?= $destinasi['nama_tempat_wisata']; ?></p>
                    <!-- <p><?= $destinasi['alamat_tempat_wisata']; ?></p> -->
                    <p>Tiket Teresia : <?= $destinasi['stok_tiket']; ?></p>
                    <!-- Informasi tambahan -->
                    <hr>

                    <p class="mb-1">Tanggal Kunjungan:<span id="info-tanggal"></span></p>
                    <p class="mb-1"><strong>Jumlah Orang:</strong> <span id="info-jumlah-orang">1</span></p>
                    <p class="mb-1"><strong>Total Harga:</strong> <span id="total-harga">Rp.<?= number_format($destinasi['biaya_tempat_wisata']); ?></span></p>
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
        var hargaDestinasi = <?= $destinasi['biaya_tempat_wisata']; ?>;
        var totalHarga = jumlahOrang * hargaDestinasi;

        document.getElementById('total-harga').textContent = 'Rp.' + totalHarga.toLocaleString();
        document.getElementById('info-jumlah-orang').textContent = jumlahOrang;
    }

    function submitForm() {
        var tanggal = document.getElementById('tanggal_kunjungan').value;
        document.getElementById('info-tanggal').textContent = tanggal;

        document.getElementById('form-pemesanan').submit();
    }
</script>

<?php $this->load->view('landing/footer') ?>