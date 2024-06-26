<?php $this->load->view('landing/header') ?>


<!-- <link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>"> -->
<!-- Navbar -->
<?php $this->load->view('landing/navbar') ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_4.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user/tempat_wisata'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hotel <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Wishlist</h1>
            </div>z
        </div>
    </div>
</section>
<!-- wishlist_page.php -->

<div class="container  ftco-animate">
    <div class="row mt-5 ftco-animate">
        <?php foreach ($wishlist as $item) : ?>

            <?php if ($item->id_event) : ?>

                <div class="col-md-4">
                    <div class="project-wrap hotel">
                        <a href="<?= base_url('user/event/detail/' . $item->id_event); ?>" class="img">
                            <img src="<?= base_url() . '/upload/event/' . $item->gambar_event1; ?>" alt="" class="img">
                            <span class="price"><?= date('F j, Y', strtotime($item->tgl_ditambah)); ?></span>
                        </a>
                        <div class="text p-4 mb-2">
                            <h3 class="mb-3"><a href="<?= base_url('user/event/detail/' . $item->id_event); ?>"><?= $item->nama_event; ?></a></h3>
                            <a href="<?= base_url('user/wishlist/delete/' . $item->id_wishlist); ?>" class="btn btn-danger">delete</a>

                        </div>
                    </div>
                </div>

            <?php elseif ($item->id_akomodasi) : ?>

                <div class="col-md-4">
                    <div class="project-wrap hotel">
                        <a href="<?= base_url('user/akomodasi/detail/' . $item->id_akomodasi); ?>" class="img">
                            <img src="<?= base_url() . '/upload/akomodasi/' . $item->gambar_akomodasi1; ?>" alt="" class="img">
                            <span class="price"><?= date('F j, Y', strtotime($item->tgl_ditambah)); ?></span>
                        </a>
                        <div class="text p-4 mb-2">
                            <h3 class="mb-3"><a href="<?= base_url('user/akomodasi/detail/' . $item->id_akomodasi); ?>"><?= $item->nama_akomodasi; ?></a></h3>
                            <a href="<?= base_url('user/wishlist/delete/' . $item->id_wishlist); ?>" class="btn btn-danger">delete</a>

                        </div>
                    </div>
                </div>

            <?php elseif ($item->id_tempat_wisata) : ?>
                <div class="col-md-4">
                    <div class="project-wrap hotel">
                        <a href="<?= base_url('user/tempat_wisata/detail/' . $item->id_tempat_wisata); ?>" class="img">
                            <img src="<?= base_url() . '/upload/destinasi/' . $item->gambar1; ?>" alt="" class="img">
                            <span class="price"><?= date('F j, Y', strtotime($item->tgl_ditambah)); ?></span>
                        </a>
                        <div class="text p-4 mb-2">
                            <h3 class="mb-3"><a href="<?= base_url('user/tempat_wisata/detail/' . $item->id_tempat_wisata); ?>"><?= $item->nama_tempat_wisata; ?></a></h3>
                            <a href="<?= base_url('user/wishlist/delete/' . $item->id_wishlist); ?>" class="btn btn-danger">delete</a>

                        </div>
                    </div>
                </div>

            <?php endif; ?>

        <?php endforeach; ?>
    </div>
</div>


<!-- Tambahkan script SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Di dalam view, misalnya user/wishlist/wishlist.php -->
<?php if ($this->session->flashdata('pesan')) : ?>
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Pesan',
            text: '<?= $this->session->flashdata("pesan"); ?>',
            showConfirmButton: false,
            timer: 3000 // Waktu (ms) pesan ditampilkan sebelum otomatis hilang
        });
    </script>
<?php elseif ($this->session->flashdata('success_message')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '<?= $this->session->flashdata("success_message"); ?>',
            showConfirmButton: false,
            timer: 3000 // Waktu (ms) pesan ditampilkan sebelum otomatis hilang
        });
    </script>
<?php elseif ($this->session->flashdata('error_message')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $this->session->flashdata("error_message"); ?>',
            showConfirmButton: false,
            timer: 3000 // Waktu (ms) pesan ditampilkan sebelum otomatis hilang
        });
    </script>
<?php endif; ?>

<!-- Tampilkan daftar wishlist -->

<?php $this->load->view('landing/footer') ?>