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
    <img src="<?= base_url() . '/upload/event/' . $event['gambar_event']; ?>" alt="" class="image" style="height: 100vh;">
    <div class=" overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-0 bread">Event</h1>
            </div>
        </div>
    </div>
</section>


<div class="cards-8 section">
    <div class="container ftco-animate">
        <div class="row">
            <div class="col-md-9 d-flex justify-content-between">
                <div class="mt-5 kontent">
                    <ul class="kategori">
                        <li> | <?= $event['alamat_event']; ?></li>
                        <li> | <?php foreach ($tempat_wisata_list as $tw) : ?>
                                <?php if ($tw->id_tempat_wisata == $event['id_tempat_wisata']) : ?>
                                    <?= $tw->nama_tempat_wisata; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                    <ul class="kategori">
                        <li>
                            <p class="title"><?php echo $event['nama_event']; ?></p>
                        </li>
                        <li>
                            <a title="Wishlist" class="btn btn-just-icon btn-simple btn-warning" href="<?= base_url('user/wishlist/add_to_wish/null/' . $event['id_event']); ?>">
                                <i class="fa fa-heart"></i>
                            </a>
                        </li>


                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mt-5">
                    <div class="price-container">
                        <div class="harga">
                            <p class="fw-bold mb-0">Biaya Masuk </p>
                            <p class="fw-bold">Rp.<?= number_format($event['biaya_event']); ?></p>
                            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#pesanTiketModal">
                                Pesan Tiket
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapped-description">
                <p><?php echo $event['deskripsi_event'] ?></p>
            </div>
            <div class="map-container mt-5">
                <div class="map-info">
                    <p><i class="fa fa-map-marker map-icon"></i> Lokasi:</p>
                    <div class="wrap">
                        <p width="600" height="450"><?php echo $event['lokasi_event']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>






<?php $this->load->view('landing/footer') ?>