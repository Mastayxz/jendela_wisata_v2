<?php $this->load->view('landing/header') ?>
<link rel="stylesheet" href="<?= base_url('public/css/design.css'); ?>">

<?php $this->load->view('landing/navbar') ?>
<style>
    p {
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
        /* Adjust the gap between items */
    }

    .facility-list li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .facility-list li::before {
        content: "\2713";
        /* Unicode for check mark */
        color: green;
        margin-right: 10px;
    }

    .dropdown-menu {
        width: 100%;
    }

    .rounded {
        border-radius: 15px;
        /* Sesuaikan dengan keinginan Anda */
    }
</style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_2.jpg'); background-color:#F2F1EB;">
    <div class="overlay"></div>
    <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi1']; ?>" alt="" class="hero-wrap hero-wrap-2 js-fullheight">
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-0 bread">Destination</h1>
            </div>
        </div>
    </div>
</section>

<div class="container ftco-animate">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="wrap mt-3">
                        <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi1']; ?>" alt="" class="image rounded" style="height: 80vh;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wrap mt-3">
                        <div class="image-grid rounded" style="display: flex; flex-direction: column;">
                            <!-- Gambar 1 -->
                            <div class="image-wrapper" style="margin-bottom: 10px;">
                                <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi2']; ?>" alt="" class="small-image rounded">
                            </div>
                            <!-- Gambar 2 -->
                            <div class="image-wrapper">
                                <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi3']; ?>" alt="" class="small-image rounded">
                            </div>
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
            <div class="col-md-9 justify-content-between">
                <div class="mt-5 kontent content-section">
                    <ul class="kategori">
                        <li> | <?= $akomodasi['alamat_akomodasi']; ?></li>
                        <li> |
                            <?php foreach ($tempat_wisata_list as $tw) : ?>
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
                        <li>
                            <a title="Wishlist" class="btn btn-just-icon btn-simple btn-pink btn-wishlist" href="<?= base_url('user/wishlist/add_to_wish/' . $akomodasi['id_akomodasi']); ?>">
                                <i class="fa fa-heart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="heading-section ftco-animate content-section">
                    <h4 class="">Description</h4>
                    <div class="">
                        <p><?php echo $akomodasi['deskripsi_akomodasi'] ?></p>
                    </div>
                </div>
                <div class="heading-section ftco-animate content-section">
                    <h4 class="">Facility</h4>
                    <div class="">
                        <ul class="facility-list">
                            <?php
                            $facilities = explode(',', $akomodasi['fasilitas_akomodasi']);
                            foreach ($facilities as $facility) : ?>
                                <li><?php echo trim($facility); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="content-section">
                    <h3>Kamar</h3>
                    <table class="table">
                        <tr>
                            <th>Gambar</th>
                            <th>Tipe Kamar</th>
                            <th>Harga</th>
                        </tr>
                        <?php foreach ($kamar as $k) : ?>
                            <tr>
                                <td><img src="<?= $k->gambar ?>" alt="<?= $k->tipe_kamar ?>" width="100"></td>
                                <td><?= $k->tipe_kamar ?></td>
                                <td>Rp. <?= number_format($k->harga)  ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="heading-section ftco-animate content-section">
                    <h4 class="">Location </h4>
                    <div class="map-info">
                        <p><?php echo $akomodasi['lokasi_akomodasi']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-5 price-container shadow">
                    <div class="harga">
                        <p class="fw-bold mb-0">Start From</p>
                        <p class="fw-bold">Rp. <?= number_format($akomodasi['harga_akomodasi']); ?></p>
                        <div class="form-group">
                            <label for="roomType">Select Room Type</label>
                            <select id="roomType" class="form-control">
                                <?php foreach ($kamar as $k) : ?>
                                    <option value="<?= $k->id_kamar ?>"><?= $k->tipe_kamar ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <a href="<?= base_url('user/pemesanan/index/' . $akomodasi['id_akomodasi']); ?>" class="btn btn-primary w-100 mt-3">Pesan</a>
                    </div>
                </div>
            </div>
        </div>

        <hr>
    </div>
</div>

<?php $this->load->view('landing/footer') ?>