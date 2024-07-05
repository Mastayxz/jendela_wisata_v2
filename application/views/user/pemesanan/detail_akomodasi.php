<?php $this->load->view('landing/header') ?>
<style>
    .checkin-checkout{
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
                    <form id="form-pemesanan" action="<?= base_url('user/pemesanan/proses_pesan'); ?>" method="post">
                        <input type="hidden" name="id_akomodasi" value="<?= $akomodasi['id_akomodasi']; ?>">
                        <input type="hidden" name="jenis_pesanan" value="akomod asi$akomodasi">
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Nama</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $user['nama'] ?>"  readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Email</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $user['email'] ?>"  readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">No Telepon</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $user['tlp_user'] ?>"  readonly required>
                        </div>
                        <div class="checkin-checkout">
                            <div class="form-group">
                                <label for="tanggal_kunjungan">Chekin:</label>
                                <input type="date" class="form-control" id="tanggal_kunjungan" name="checkin" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kunjungan">Checkout:</label>
                                <input type="date" class="form-control" id="tanggal_kunjungan" name="checkout" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_orang">Jumlah Kamar:</label>
                            <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_orang" min="1" value="1" onchange="hitungTotalHarga()" required>
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
                    <?php if (!empty($kamar)) : ?>
                        <strong>Kamar Tersedia : <?= $kamar->jumlah;  ?> </strong>
                    <?php else : ?>
                        <strong>Kamar Tersedia : Data tidak tersedia</strong>
                    <?php endif; ?>
                    
                    <hr>
                   
                    <!-- Tombol Pemesanan dari Harga -->
                    <button type="button" class="btn btn-primary w-100 mt-3" id="btn-harga" onclick="submitForm()" disabled>Pesan dari Harga</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('landing/footer') ?>