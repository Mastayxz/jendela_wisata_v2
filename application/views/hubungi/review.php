<!-- Tambahkan di dalam form -->
<?php $this->load->view('landing/header');
?>

<link rel="stylesheet" href="<?php echo base_url('public/css/design.css'); ?>">
<?php $this->load->view('landing/navbar');
?>


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact us <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Contact us</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section contact-section ftco-no-pt">

    <div class="container mt-5">
        <div class="col-md-12 heading-section  ftco-animate ">
            <span class="subheading">description</span>
        </div>
        <div class="row block-9">
            <div class="col-md-12 order-md-last ">
                <form action="<?php echo base_url('c_hubungi/index') ?>" class="bg-light p-5 contact-form" method="post">
                    <div class="form-group">
                        <label for="review">Review:</label>
                        <textarea cols="30" rows="7" class="form-control" name="review" placeholder="Your Review"><?php echo set_value('review'); ?></textarea>
                        <?php echo form_error('review', '<small class="text-danger p-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <div class="rating">
                            <input type="radio" name="rating" id="star5" value="5" />
                            <label for="star5"></label>
                            <input type="radio" name="rating" id="star4" value="4" />
                            <label for="star4"></label>
                            <input type="radio" name="rating" id="star3" value="3" />
                            <label for="star3"></label>
                            <input type="radio" name="rating" id="star2" value="2" />
                            <label for="star2"></label>
                            <input type="radio" name="rating" id="star1" value="1" />
                            <label for="star1"></label>
                        </div>
                        <?php echo form_error('rating', '<small class="text-danger p-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Submit Review" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('landing/footer') ?>