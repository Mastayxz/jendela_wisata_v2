<?php $this->load->view('landing/header') ?>
<link rel="stylesheet" href="<?= base_url('public/css/design.css'); ?>">

<?php $this->load->view('user/pemesanan/navbar_pesanan');
?>
<div class="container mt-5">
    <?php if (!empty($akomodasi)) : ?>
        <h2>Detail Akomodasi</h2>
        <p>Nama Akomodasi: <?php echo $akomodasi['nama_akomodasi']; ?></p>
        <p>Lokasi: <?php echo $akomodasi['lokasi_akomodasi']; ?></p>
        <p>Harga: <?php echo $akomodasi['harga_akomodasi']; ?></p>
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
                <label for="checkin">Tanggal Check-In:</label>
                <input type="date" class="form-control" id="checkin" name="checkin">
            </div>
            <div class="form-group">
                <label for="checkout">Tanggal Check-Out:</label>
                <input type="date" class="form-control" id="checkout" name="checkout">
            </div>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>
    <?php elseif (!empty($event)) : ?>
        <h2>Detail Event</h2>
        <p>Nama Event: <?php echo $event['nama_event']; ?></p>
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
        <h2>Detail Destinasi</h2>
        <p>Nama Tempat Wisata: <?php echo $destinasi['nama_tempat_wisata']; ?></p>
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