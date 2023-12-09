<?php $this->load->view('landing/header') ?>
<link rel="stylesheet" href="<?= base_url('public/css/design.css'); ?>">

<?php $this->load->view('landing/navbar') ?>

<style>
    p {
        color: black;
    }
</style>
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_2.jpg');
">
    <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi1']; ?>" alt="" class="image" style="height: 100vh;">
    <div class=" overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-0 bread">Destination</h1>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="wrap mt-5">
                        <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi1']; ?>" alt="" class="image" style="height: 73vh;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrap mt-5">
                        <div class="image-grid">
                            <!-- Gambar 1 -->
                            <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi2']; ?>" alt="" class="small-image " style="height: 73vh;">
                            <!-- Gambar 2 -->
                            <img src=" <?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi3']; ?>" alt="" class="small-image" style="height: 73vh;">
                            <!-- Gambar 3 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="cards-8 section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 d-flex justify-content-between">
                <div class="mt-5 kontent">
                    <ul class="kategori">
                        <li> | <?= $akomodasi['alamat_akomodasi']; ?></li>
                        <li> | <?php foreach ($tempat_wisata_list as $tw) : ?>
                                <?php if ($tw->id_tempat_wisata == $akomodasi['id_tempat_wisata']) : ?>
                                    <?= $tw->nama; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                    <ul class="kategori">
                        <li>
                            <p class="title"><?php echo $akomodasi['nama_akomodasi']; ?></p>
                        </li>
                        <li> <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-simple btn-warning" data-original-title="Saved to Wishlist"> <i class="fa fa-heart"></i> </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-5">
                    <div class="price-container">
                        <div class="harga">
                            <p class="fw-bold mb-0">Harga</p>
                            <p class="fw-bold">Rp.<?= number_format($akomodasi['harga_akomodasi']); ?></p>
                            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#pesanTiketModal">
                                Pesan Tiket
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapped-description">
                <p><?php echo $akomodasi['deskripsi_akomodasi'] ?></p>
            </div>
            <div class="map-container mt-5">
                <div class="map-info">
                    <p><i class="fa fa-map-marker map-icon"></i> Lokasi:</p>
                    <p><?php echo $akomodasi['lokasi_akomodasi']; ?></p>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pesanTiketModal" tabindex="-1" role="dialog" aria-labelledby="pesanTiketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pesanTiketModalLabel">Form Pemesanan Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tempatkan formulir pemesanan tiket di sini -->
                <form id="formPesanTiket">
                    <!-- ... (elemen formulir lainnya) ... -->
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Jumlah Tiket</label>
                        <input type="number" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Waktu</label>
                        <input type="time" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#formPesanTiket').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir (untuk keperluan contoh)
            // Tambahkan logika pengiriman data formulir atau interaksi lain di sini
            $('#pesanTiketModal').modal('hide'); // Menutup modal setelah pengiriman formulir (gantilah dengan logika sesuai kebutuhan)
        });
    });
</script>


<?php $this->load->view('landing/footer') ?>