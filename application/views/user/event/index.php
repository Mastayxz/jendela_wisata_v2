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
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user/tempat_wisata'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Event <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Event And Activity</h1>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('landing/bar') ?>
<!-- <div class="card-tools">
    <div class="input-group input-group-sm" style="width: 200px; height:0px;">
        <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Search" style="width: 200px; height:40px;">
        <div class=" input-group-append">
            <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</div> -->


<div class="container ftco-animate">
    <div class="row mt-5" id="search_results">

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="<?= base_url('public/js/filter.js') ?>"></script>
<!-- JS -->
<?php $this->load->view('landing/footer') ?>