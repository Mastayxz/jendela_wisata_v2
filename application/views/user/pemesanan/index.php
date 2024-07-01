<?php $this->load->view('landing/header') ?>
<link rel="stylesheet" href="<?= base_url('public/css/pemesanan.css'); ?>">


<?php $this->load->view('user/pemesanan/navbar_pesanan');
?>
<div class="container mt-5">
    <?php if (!empty($akomodasi)) : ?>
        <h1>Detail Pemesanan Akomodasi</h1>
        <h2><?php echo $akomodasi['nama_akomodasi']; ?></h2> 
        <!-- Formulir Pemesanan -->
        <>
            <div class="data-diri">
            <fieldset disabled>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Nama</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $user['nama']?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Email</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $user['email']?>">
                </div>
            </fieldset>
            </div>
            <div class="chekin-checkout">
                <div class="form-group">
                    <label for="checkin">Tanggal Check-In</label>
                    <input type="date" class="form-control" id="checkin" name="checkin">
                </div>
                <div class="form-group">
                    <label for="checkout">Tanggal Check-Out</label>
                    <input type="date" class="form-control" id="checkout" name="checkout">
                </div>
            </div>
            <p>Total Harga: nanti disi dengan hasil dari jumlah chekin chekout <?php echo $akomodasi['harga_akomodasi']; ?></p>
            <hr>
            <div class="vasilitas">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Kamar</th>
                    <th scope="col">Harga/Malam</th>
                
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo $kamar['tipe_kamar'] ?></td>
                        <td><?php echo $kamar['harga']?></td>
                    </tr>   
                </tbody>
            </table>
            </div>
            <div class='detail-pemesanan'>
                <div class="detail">
                    <p><?php echo $akomodasi['nama_akomodasi']?></p>
                    <p><?php echo $kamar['tipe_kamar'] ?></p>
                    <p><?php echo $kamar['harga']?></p>
                </div>
                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
            </div>
            <p><?php echo $akomodasi['lokasi_akomodasi']; ?></p>
        </form>
    <?php elseif (!empty($event)) : ?>
        <h1>Detail Event</h1>
        <h2>Nama Event: <?php echo $event['nama_event']; ?></h2>
        <!-- <p>Waktu: <?php echo $event['waktu']; ?></p> -->
        <!-- Formulir Pemesanan -->
        <form>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="jumlah_tiket">Jumlah Tiket:</label>
                <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket">
            </div>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>
    <?php elseif (!empty($destinasi)) : ?>
        <h1>Detail Destinasi</h1>
        <h2><?php echo $destinasi['nama_tempat_wisata']; ?></h2>
        <p>Alamat: <?php echo $destinasi['alamat_tempat_wisata']; ?></p>
        <!-- Formulir Pemesanan -->
        <form action="<?php echo base_url('pemesanan/step2'); ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
                <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan">
            </div>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>
    <?php else : ?>
        <p>Tidak ada detail pemesanan yang tersedia.</p>
    <?php endif; ?>
</div>

