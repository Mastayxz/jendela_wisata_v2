<?php $this->load->view('landing/header') ?>
<style>
    .checkin-checkout {
        display: flex;
        align-items: start;
        justify-content: flex-start;
        gap: 10px;
    }
</style>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-7">
            <?php if (!empty($akomodasi)) : ?>
                <!-- Alert Informasi dan Tombol Kembali -->
                <div class="alert alert-info">
                    <a href="<?= base_url('user/tempat_wisata'); ?>" class="btn btn-secondary mb-2">Kembali</a>
                    <strong>Info:</strong> Silakan isi formulir di bawah ini untuk melakukan pemesanan.
                </div>

                <!-- Detail akomodasi$akomodasi dan Formulir Pemesanan -->
                <div class="card rounded shadow-sm p-4">
                    <h2>Detail Pemesanan</h2>
                    <!-- <p>Nama Tempat Wisata: <?= $akomodasi['nama_akomodasi']; ?></p> -->
                    <!-- <p>Alamat: <?= $akomodasi['alamat_akomodasi']; ?></p> -->
                    <!-- Formulir Pemesanan -->
                    <form id="form-pemesanan" action="<?= base_url('user/pemesanan/pemesanan_kamar'); ?>" method="post">
                        <input type="hidden" name="id_akomodasi" value="<?= $akomodasi['id_akomodasi']; ?>">
                        <input type="hidden" name="kamar_id" value="<?= $kamar->id_kamar; ?>">
                        <input type="hidden" name="jenis_pesanan" value="akomodasi">

                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Nama</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $user['nama'] ?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Email</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $user['email'] ?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">No Telepon</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $user['tlp_user'] ?>" readonly required>
                        </div>
                        <div class="checkin-checkout">
                            <div class="form-group">
                                <label for="checkin">Check-in:</label>
                                <input type="date" class="form-control" id="checkin" name="check_in" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout">Check-out:</label>
                                <input type="date" class="form-control" id="checkout" name="check_out" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_orang">Jumlah Orang:</label>
                            <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" min="1" value="1" onchange="hitungTotalHarga()" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kamar">Jumlah Kamar:</label>
                            <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_kamar" min="1" value="1" onchange="hitungTotalHarga()" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="setuju" name="setuju" onchange="checkAgreement()" required>
                            <label class="form-check-label" for="setuju">Saya setuju dengan ketentuan yang berlaku</label>
                        </div>
                    </form>
                    <div class="fasilitas">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Kamar</th>
                                    <th scope="col">Harga/Malam</th>
                                    <th scope="col">Jumlah Kamar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="<?= $kamar->gambar ?>" alt="<?= $kamar->tipe_kamar ?>" width="100"></td>
                                    <td><?= $kamar->tipe_kamar ?></td>
                                    <td>Rp.<?= number_format($kamar->harga) ?></td>
                                    <td>Jumlah Kamar <?= $kamar->jumlah ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else : ?>
                <p>Tidak ada detail pemesanan yang tersedia.</p>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <div class="mt-5 price-container shadow">
                <div class="harga p-3">
                    <img src="<?= base_url('upload/akomodasi/' . $akomodasi['gambar_akomodasi1']); ?>" alt="" class="image" style="height: 10vh; width:100px;">
                    <h4 class="fw-bold mt-3">Price</h4>
                    <p class="fw-bold"><?= $akomodasi['nama_akomodasi']; ?></p>
                    <p id="harga-akomodasi$akomodasi">Rp.<?= number_format($kamar->harga); ?></p>
                    <hr>
                    <p class="mb-1">Tanggal Kunjungan: <span id="info-tanggal"></span></p>
                    <p class="mb-1"><strong>Jumlah Orang:</strong> <span id="info-jumlah-orang">1</span></p>
                    <hr>
                    <button type="button" class="btn btn-primary w-100 mt-3" id="btn-harga" onclick="submitForm()" disabled>Pesan dari Harga</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('landing/footer') ?>

<script>
    function checkAgreement() {
        var checkbox = document.getElementById('setuju');
        var btnHarga = document.getElementById('btn-harga');

        btnHarga.disabled = !checkbox.checked;
    }

    function hitungTotalHarga() {
        const hargaPerMalam = <?= $kamar->harga; ?>;
        const jumlahKamar = document.getElementById('jumlah_kamar').value;
        const jumlahHari = (new Date(document.getElementById('checkout').value) - new Date(document.getElementById('checkin').value)) / (1000 * 60 * 60 * 24);

        if (jumlahHari > 0 && jumlahKamar > 0) {
            const totalHarga = hargaPerMalam * jumlahKamar * jumlahHari;
            document.getElementById('harga-akomodasi').innerText = 'Rp.' + totalHarga.toLocaleString();
            document.getElementById('btn-harga').disabled = false;
        } else {
            document.getElementById('btn-harga').disabled = true;
        }
    }

    function submitForm() {
        document.getElementById('form-pemesanan').submit();
    }

    document.getElementById('checkin').addEventListener('change', hitungTotalHarga);
    document.getElementById('checkout').addEventListener('change', hitungTotalHarga);
    document.getElementById('jumlah_kamar').addEventListener('input', hitungTotalHarga);
    document.getElementById('jumlah_orang').addEventListener('input', hitungTotalHarga);
</script>