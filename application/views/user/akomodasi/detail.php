<?php $this->load->view('landing/header') ?>
<link rel="stylesheet" href="<?= base_url('public/css/design.css'); ?>">

<?php $this->load->view('landing/navbar') ?>


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_2.jpg');
">
    <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi1']; ?>" alt="" class="image" style="height: 100vh;">
    <!-- <div class=" overlay"></div> -->
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-0 bread">Destination</h1>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid ftco-animate mt-5">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="wrap mt-5">
                        <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi1']; ?>" alt="" class="image" style="height: 80vh;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wrap mt-5">
                        <div class="image-grid" style="display: flex; flex-direction: column; height: 73vh;">
                            <!-- Gambar 1 -->
                            <img src=" <?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi2']; ?>" alt="" class="small-image " style="flex: 1; height:40vh;">
                            <!-- Gambar 2 -->
                            <img src=" <?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi3']; ?>" alt="" class="small-image" style="flex: 1; height:40vh;">
                            <!-- Gambar 3 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="cards-8 section">
    <div class="container ftco-animate">
        <div class="row">
            <div class="col-md-9 d-flex justify-content-between">
                <div class="mt-5 kontent">
                    <ul class="kategori">
                        <li> | <?= $akomodasi['alamat_akomodasi']; ?></li>
                        <li> | <?php foreach ($tempat_wisata_list as $tw) : ?>
                                <?php if ($tw->id_tempat_wisata == $akomodasi['id_tempat_wisata']) : ?>
                                    <?= $tw->nama_tempat_wisata; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                    <ul class="kategori">
                        <li>
                            <p class="title"><?php echo $akomodasi['nama_akomodasi']; ?></p>
                        </li>
                        <li> <a title="Wishlist" class="btn btn-just-icon btn-simple btn-pink" href="<?= base_url('user/wishlist/add_to_wish/' . $akomodasi['id_akomodasi']); ?>">
                                <i class="fa fa-heart"></i>
                            </a>
                            <!-- <a title="Wishlist" class="btn btn-just-icon btn-simple btn-warning" href="<?= base_url('user/wishlist/add_to_wishlist/' . $akomodasi['id_akomodasi'] . '/akomodasi'); ?>">
                            <i class="fa fa-heart"></i>
                        </a> -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-5">
                    <div class="price-container">
                        <div class="harga">
                            <p class="fw-bold mb-0">Price Accomodation</p>
                            <p class="fw-bold">Rp.<?= number_format($akomodasi['harga_akomodasi']); ?></p>

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