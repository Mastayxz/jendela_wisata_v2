<?php $this->load->view('landing/header');
 ?>
<link rel="stylesheet"  style="" href="<?php echo base_url('public/css/design.css'); ?>"> 
<?php $this->load->view('landing/navbar');
 ?>
  
 <!-- END nav -->


 <!-- Controler-->
 <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('./assets/landing/images/bg_1.jpg');">
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

<section class="ftco-section ftco-no-pb contact-section mb-4">
  <div class="container">
    <div class="row d-flex contact-info">
      <div class="col-md-3 d-flex">
       <div class="align-self-stretch box p-4 text-center">
        <div class="icon d-flex align-items-center justify-content-center">
         <span class="fa fa-map-marker"></span>
       </div>
       <h3 class="mb-2">Address</h3>
       <p><!--alamat--></p>
     </div>
   </div>
   <div class="col-md-3 d-flex">
     <div class="align-self-stretch box p-4 text-center">
      <div class="icon d-flex align-items-center justify-content-center">
       <span class="fa fa-phone"></span>
     </div>
     <h3 class="mb-2">Contact Number</h3>
     <p><a href="https://api.whatsapp.com/send/?phone=6287761753468&text=Helo,Contantc Person&type=phone_number&app_absent=0">087761753468</a></p>
   </div>
 </div>
 <div class="col-md-3 d-flex">
   <div class="align-self-stretch box p-4 text-center">
    <div class="icon d-flex align-items-center justify-content-center">
     <span class="fa fa-paper-plane"></span>
   </div>
   <h3 class="mb-2">Email Address</h3>
   <p><a href="mailto:info@yoursite.com">alimanbudi@gmail.com</a></p>
 </div>
</div>
<div class="col-md-3 d-flex">
 <div class="align-self-stretch box p-4 text-center">
  <div class="icon d-flex align-items-center justify-content-center">
   <span class="fa fa-globe"></span>
 </div>
 <h3 class="mb-2">Website</h3>
 <p><a href="http://localhost/jendela_wisata_v2/user/akomodasi">http://localhost/jendela_
  wisata_v2/user/akomodasi</a></p>
</div>
</div>
</div>
</div>
</section>

<section class="ftco-section contact-section ftco-no-pt">
  <div class="container">
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form action="#" class="bg-light p-5 contact-form">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Your Email">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Subject">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" name="massage" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
        
      </div>

      <div class="col-md-6 d-flex">
       <div id="map" class="bg-white"></div>
     </div>
   </div>
 </div>
</section>

<section class="ftco-intro ftco-section ftco-no-pt">
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-12 text-center">
    <div class="img"  style="background-image: url(images/bg_2.jpg);">
     <div class="overlay"></div>
     <h2>We Are Pacific A Travel Agency</h2>
     <p>We can manage your dream building A small river named Duden flows by their place</p>
     <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Ask For A Quote</a></p>
   </div>
 </div>
</div>
</div>
</section>


<?php $this->load->view('landing/footer');
 ?>
