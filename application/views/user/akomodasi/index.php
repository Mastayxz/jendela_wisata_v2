<!-- Meta -->
<?php $this->load->view('landing/header') ?>


<link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
<!-- Navbar -->
<?php $this->load->view('landing/navbar') ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user/tempat_wisata'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hotel <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Akomodasi</h1>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('landing/bar') ?>



<div class="container">
    <div class="row mt-5">
        <?php foreach ($akomodasi as $ak) : ?>
            <div class="col-md-4 ftco-animate">

                <div class="project-wrap hotel">
                    <a href="#" class="img">
                        <img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi1; ?>" class="img">
                        <span class="price">Rp. <?= number_format($ak->harga_akomodasi); ?> </span>
                    </a>
                    <div class="text p-4 mb-2">
                        <h3><a href="<?= base_url('user/akomodasi/detail/' . $ak->id_akomodasi); ?>" class="mb-5"><?= $ak->nama_akomodasi; ?></a></h3>

                        <div class="location"><span class="fa fa-map-marker"></span> <?= $ak->alamat_akomodasi; ?> </div>
                        <div class="location"><span class="flaction-hotel"></span> <?= $ak->nama_jenis_akomodasi; ?> </div>
                        <ul>
                            <li><span class="flaticon-shower"></span>2</li>
                            <li><span class="flaticon-king-size"></span>3</li>
                            <li><span class="flaticon-sun-umbrella"></span><?= $ak->nama; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<article class="col-md-12">

    <!-- PRODUCT CARDS -->
    <!-- <a href="<?= base_url('user/Home'); ?>" class="btn btn-primary">Destinasi</a> -->
    <!-- <div class="cards-8 section-gray"> -->

    <!-- <div class="container">
        <div class="row mt-5">
            <?php foreach ($akomodasi as $ak) : ?>
                <div class="col-md-3">
                    <div class="card card-product">
                        <div class="card-image">
                            <a href="#"> <img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi1; ?>" alt=""></a>
                        </div>
                        <div class="table">
                            <h6 class="category text-rose">Destinasi</h6>
                            <h4 class="card-caption">
                                <a href="#"><?= $ak->nama_akomodasi; ?></a>
                            </h4>
                            <div class="card-address"><?= $ak->nama_jenis_akomodasi; ?></div>
                            <div class="card-address"><?= $ak->alamat_akomodasi; ?></div>

                            <div class="ftr">
                                <div class="price">
                                    <h5 class="mt-3">Rp. <?= number_format($ak->harga_akomodasi); ?></h5>
                                </div>
                                <div class="stats">
                                    <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-simple btn-warning" data-original-title="Saved to Wishlist"> <i class="fa fa-heart"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div> -->

    <!-- </div> -->
</article>


<!-- JS -->
<?php $this->load->view('landing/footer') ?>