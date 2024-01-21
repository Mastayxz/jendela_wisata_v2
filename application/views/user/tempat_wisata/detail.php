    <?php $this->load->view('landing/header') ?>

    <link rel="stylesheet" style="" href="<?= base_url('public/css/design.css'); ?>">

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
                            <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar1']; ?>" alt="" class="image" style="height: 62vh;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrap mt-5">
                            <div class="image-grid" style="display: flex; flex-direction: column; height: 60vh;">
                                <!-- Gambar 1 -->
                                <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar3']; ?>" alt="" class="small-image" style="flex: 1; height:30vh;">
                                <!-- Gambar 2 -->
                                <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar2']; ?>" alt="" class="small-image" style="flex: 1; height:30vh;">
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
                            <li>
                                <a title="Wishlist" class="btn btn-just-icon btn-simple btn-pink" href="<?= base_url('user/wishlist/add_to_wish/null/null/' . $destinasi['id_tempat_wisata']); ?>">
                                    <i class="fa fa-heart"></i>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mt-5">
                        <div class="price-container">
                            <div class="harga">
                                <p class="fw-bold mb-0">Price </p>
                                <p class="fw-bold">Rp.<?= number_format($destinasi['biaya_tempat_wisata']); ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center pb-4">
                    <div class="col-md-12 heading-section  ftco-animate">
                        <span class="subheading">description</span>
                    </div>
                    <div class="wrapped-description">
                        <p><?php echo $destinasi['deskripsi_tempat_wisata'] ?></p>

                    </div>
                    <div class="col-md-12 heading-section  ftco-animate mt-5">
                        <span class="subheading">facility</span>
                    </div>
                    <div class="wrapped-description">
                        <h5>fasilitas</h5>
                        <p><?php echo $destinasi['fasilitas_tempat_wisata'] ?></p>

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


        <!-- Accommodations Section -->
        <div class="container mt-5">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Accomodation</span>
                    <h2 class="mb-4">Accomodation Nearby</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($akomodasi as $ak) : ?>
                    <div class="col-md-4 ">
                        <div class="project-wrap hotel">
                            <a href="#" class="img">
                                <img src="<?= base_url() . '/upload/akomodasi/' . $ak['gambar_akomodasi1']; ?>" class="img">
                                <span class="price">Rp. <?= number_format($ak['harga_akomodasi']); ?> </span>
                            </a>
                            <div class="text p-4 mb-2">
                                <h3><a href="<?= base_url('user/akomodasi/detail/' . $ak['id_akomodasi']); ?>" class="mb-5"><?= $ak['nama_akomodasi']; ?></a></h3>

                                <div class="location"><span class="fa fa-map-marker"></span> <?= $ak['alamat_akomodasi']; ?> </div>

                                <?php if (isset($ak['nama_jenis_akomodasi'])) : ?>
                                    <div class="location"><span class="flaction-hotel"></span> <?= $ak['nama_jenis_akomodasi']; ?> </div>
                                <?php endif; ?>

                                <ul>
                                    <li><span class="flaticon-shower"></span>2</li>
                                    <li><span class="flaticon-king-size"></span>3</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <!-- Events Section -->
        <div class="container mt-5">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Event And Activity</span>
                    <h2 class="mb-4">Event And Activity</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($event as $ev) : ?>
                    <div class="col-md-4">
                        <div class="project-wrap hotel">
                            <a href="#" class="img">
                                <img src="<?= base_url() . '/upload/event/' . $ev['gambar_event']; ?>" class="img">
                                <span class="price">Rp. <?= number_format($ev['biaya_event']); ?> </span>
                            </a>
                            <div class="text p-4 mb-2">
                                <h3><a href="<?= base_url('user/event/detail/' . $ev['id_event']); ?>" class="mb-5"><?= $ev['nama_event']; ?></a></h3>

                                <div class="location"><span class="fa fa-map-marker"></span> <?= $ev['alamat_event']; ?> </div>

                                <ul>
                                    <li><span class="flaticon-shower"></span><?= $ev['jam_buka']; ?> - <?= $ev['jam_tutup']; ?></li>
                                    <li><span class="fa fa-calendar"></span><?= $ev['tanggal_event']; ?> </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php $this->load->view('landing/footer') ?>