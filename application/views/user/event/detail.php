<?php $this->load->view('landing/header') ?>
<link rel="stylesheet" href="<?= base_url('public/css/design.css'); ?>">

<?php $this->load->view('landing/navbar') ?>

<style>
    p,
    li {
        color: black;
    }

    .content-section {
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .price-container {
        position: sticky;
        top: 200px;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        background-color: #fff;
    }

    .map-container {
        margin-top: 20px;
    }

    .heading-section h4,
    .heading-section h3 {
        font-weight: bold;
    }

    .facility-list {
        list-style: none;
        padding-left: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .facility-list li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .facility-list li::before {
        content: "\2713";
        color: green;
        margin-right: 10px;
    }
</style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_2.jpg');">
    <img src="<?= base_url() . '/upload/event/' . $event['gambar_event1']; ?>" alt="" class="image" style="height: 100vh;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-0 bread">Event</h1>
            </div>
        </div>
    </div>
</section>

<div class="container ftco-animate">
    <div class="row">
        <div class="container-fluid">
            <div class="row rouded-4">
                <div class="col-md-8">
                    <div class="wrap mt-5">
                        <img src="<?= base_url() . '/upload/event/' . $event['gambar_event1']; ?>" alt="" class="image" style="height: 74vh;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wrap mt-5">
                        <div class="image-grid" style="display: flex; flex-direction: column; height: 73vh;">
                            <!-- Gambar 1 -->
                            <img src="<?= base_url() . '/upload/event/' . $event['gambar_event2']; ?>" alt="" class="small-image " style="flex: 1; height:40vh;">
                            <!-- Gambar 2 -->
                            <img src="<?= base_url() . '/upload/event/' . $event['gambar_event3']; ?>" alt="" class="small-image" style="flex: 1; height:40vh;">
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
            <div class="col-md-8">
                <div class="mt-5 kontent content-section">
                    <ul class="kategori">
                        <li> | <?= $event['alamat_event']; ?></li>
                        <li> |
                            <?php foreach ($tempat_wisata_list as $tw) : ?>
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
                            <a title="Wishlist" class="btn btn-just-icon btn-simple btn-pink" href="<?= base_url('user/wishlist/add_to_wish/null/' . $event['id_event']); ?>">
                                <i class="fa fa-heart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="heading-section ftco-animate content-section">
                    <h4>Description</h4>
                    <div class="">
                        <p><span class="fas fa-clock"></span> <?= $event['jam_buka']; ?> - <?= $event['jam_tutup']; ?><br>
                            <span class="fas fa-calendar"></span> <?= date('F j, Y', strtotime($event['tanggal_event'])); ?>
                        </p>
                        <p><?php echo $event['deskripsi_event'] ?></p>
                    </div>
                </div>
                <div class="heading-section ftco-animate content-section">
                    <h4>Facility</h4>
                    <div class="">
                        <ul class="facility-list">
                            <?php
                            $facilities = explode(',', $event['fasilitas_event']);
                            foreach ($facilities as $facility) : ?>
                                <li><?php echo trim($facility); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="heading-section mt-5">
                    <h4><i class="fa fa-map-marker map-icon"></i>Location</h4>
                </div>
                <div class="map-container">
                    <div class="map-info">
                        <p><?php foreach ($lokasi_wisata_list as $tw) : ?>
                                <?php if ($tw->id_tempat_wisata == $event['id_tempat_wisata']) : ?>
                                    <?= $tw->lokasi_tempat_wisata; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-5 price-container shadow">
                    <div class="harga">
                        <img src="<?= base_url() . '/upload/event/' . $event['gambar_event1']; ?>" alt="" class="image my-3" style="height: 10vh; width:auto;">
                        <p class="fw-bold">Rp. <?= number_format($event['biaya_event']); ?></p>
                        <p class="fw-bold">Tiket Tersedia : <?= $event['stok_tiket']; ?></p>
                        <a href="<?= base_url('user/pemesanan/index/' . $event['id_event']); ?>" class="btn btn-primary w-100 mt-3">Pesan</a>
                    </div>
                </div>
            </div>

        </div>

        <hr>
    </div>
</div>

<?php $this->load->view('landing/footer') ?>