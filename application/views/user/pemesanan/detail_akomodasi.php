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
                    <a href="<?= base_url('user/akomodasi'); ?>" class="btn btn-secondary mb-2">Kembali</a>
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
                        <input type="hidden" name="id_kamar" value="<?= $kamar->id_kamar; ?>">
                        <input type="hidden" name="jenis_pesanan" value="akomod asi$akomodasi">
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Nama</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $user['nama'] ?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Email</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $user['email'] ?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">No Telepon</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $user['tlp_user'] ?>" readonly required>
                        </div>
                        <div class="checkin-checkout">
                            <div class="form-group">
                                <label for="tanggal_kunjungan">Chekin:</label>
                                <input type="date" class="form-control" id="checkin" name="checkin" onchange="hitungTotalHarga()" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kunjungan">Checkout:</label>
                                <input type="date" class="form-control" id="checkout" name="checkout" onchange="hitungTotalHarga()" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kamar">Jumlah Kamar:</label>
                            <input type="number" class="form-control" id="jumlah-kamar" name="jumlah_kamar" min="1" value="1" onchange="hitungTotalHarga()" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="setuju" name="setuju" onchange="checkAgreement()" required>
                            <label class="form-check-label" for="setuju">Saya setuju dengan ketentuan yang berlaku</label>
                        </div>
                        <div class="total-harga">
                            <input type="hidden" name="total-harga" id="total_Harga" onchange="hitungTotalHarga()">
                        </div>

                    </form>
                    <div>
                    </div>
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
                                <tr>
                                    <td><img src="<?= $kamar->gambar ?>" alt="<?= $kamar->tipe_kamar ?>" width="100"></td>
                                    <td><?= $kamar->tipe_kamar ?></td>
                                    <td>Rp.<?= number_format($kamar->harga) ?></td>
                                    <td>Jumlah Kamar <?php echo $kamar->jumlah ?></td>
                                </tr>
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

                    <strong class="fw-bold"><?= $akomodasi['nama_akomodasi']; ?></strong>
                    <h4 class="fw-bold mt-3">Kamar <?= $kamar->tipe_kamar;  ?></h4>
                    <strong>Price</strong>
                    <!-- <p><?= $akomodasi['alamat_akomodasi']; ?></p> -->

                    <p id="harga-akomodasi$akomodasi">Rp.<?= number_format($kamar->harga); ?></p>

                    <!-- Informasi tambahan -->
                    <hr>
                    <p class="mb-1"> Lama Menginap :<span id="info-menginap"></span> </p>
                    <p class="mb-1">Jumlah Kamar : <span id="info-jumlah-kamar"></span></p>
                    <p class="mb-1">Total Harga : <span id="total-harga"></span></p>
                    <hr>

                    <!-- Tombol Pemesanan dari Harga -->
                    <button type="button" class="btn btn-primary w-100 mt-3" id="btn-harga" onclick="submitForm()" disabled>Pesan Kamar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let hargaKamar = <?= $kamar->harga ?>;

    function checkAgreement() {
        var checkbox = document.getElementById('setuju');
        var btnHarga = document.getElementById('btn-harga');

        btnHarga.disabled = !checkbox.checked;
    }

    function hitungTotalHarga() {
        const checkIn = document.getElementById('checkin').value;
        const checkOut = document.getElementById('checkout').value;
        const jumlahKamar = document.getElementById('jumlah-kamar').value;
        if (checkIn && checkOut && jumlahKamar > 0) {
            const checkInDate = new Date(checkIn);
            const checkOutDate = new Date(checkOut);
            const timeDiff = checkOutDate - checkInDate;
            const daysDiff = timeDiff / (1000 * 3600 * 24);
            if (daysDiff > 0) {
                const totalHarga = daysDiff * hargaKamar * jumlahKamar;
                document.getElementById('total_Harga').value = totalHarga;
                document.getElementById('total-harga').textContent = 'Rp.' + totalHarga.toLocaleString('id-ID');
                document.getElementById('info-menginap').textContent = daysDiff + ' Malam';
                document.getElementById('info-jumlah-kamar').textContent = jumlahKamar;
                document.getElementById('btn-harga').disabled = true;

            } else {
                document.getElementById('total-harga').textContent = '';
                document.getElementById('info-menginap').textContent = '';
                document.getElementById('info-jumlah-kamar').textContent = '';
                document.getElementById('btn-harga').disabled = true;
            }
        } else {
            document.getElementById('total-harga').textContent = '';
            document.getElementById('info-menginap').textContent = '';
            document.getElementById('info-jumlah-kamar').textContent = '';
            document.getElementById('btn-harga').disabled = true;
        }
    }

    function submitForm() {
        document.getElementById('form-pemesanan').submit();
    }
    // function jumlahKamar(){
    //     var jumlahKamar = document.getElementById('jumlah-kamar').value;
    //     document.getElementById('info-jumlah-kamar').textContent =jumlahKamar;
    // }
</script>

<?php $this->load->view('landing/footer') ?>