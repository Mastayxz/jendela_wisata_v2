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
    <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar1']; ?>" alt="" class="image" style="height: 100vh;">
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
                <div class="col-md-8">
                    <div class="wrap mt-5">
                        <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar1']; ?>" alt="" class="image" style="height: 80vh;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wrap mt-5">
                        <div class="image-grid" style="display: flex; flex-direction: column; height: 73vh;">
                            <!-- Gambar 1 -->
                            <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar3']; ?>" alt="" class="small-image" style="flex: 1; height:40vh;">
                            <!-- Gambar 2 -->
                            <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar2']; ?>" alt="" class="small-image" style="flex: 1; height:38vh;">
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
            <div class="col-md-10 d-flex justify-content-between">
                <div class="mt-5 kontent">
                    <ul class="kategori">
                        <li>| <?php echo implode(", ", array_column($kategori, 'nama_kategori')); ?></li>
                        <li> | <?= $destinasi['alamat_tempat_wisata']; ?></li>
                    </ul>
                    <ul class="kategori">
                        <li>
                            <p class="title"><?php echo $destinasi['nama_tempat_wisata']; ?></p>
                        </li>
                        <li> <a type="button" rel="tooltip" title="" class="btn btn-just-icon btn-simple btn-warning" data-original-title="Saved to Wishlist"> <i class="fa fa-heart"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mt-5">
                    <div class="price-container">
                        <div class="harga">
                            <p class="fw-bold mb-0">Biaya Masuk </p>
                            <p class="fw-bold">Rp.<?= number_format($destinasi['biaya_tempat_wisata']); ?></p>
                            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#pesanTiketModal">
                                informasi Tiket
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapped-description">
                <p><?php echo $destinasi['deskripsi_tempat_wisata'] ?></p>
            </div>
            <div class="map-container mt-5">
                <div class="map-info">
                    <p><i class="fa fa-map-marker map-icon"></i> Lokasi:</p>
                    <div class="wrap">
                        <p width="600" height="450"><?php echo $destinasi['lokasi_tempat_wisata']; ?></p>
                    </div>

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