<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/change.css') ?>">

<form action="<?php echo base_url('c_auth/edit') ?>" method="post">
  <div class="wrapper">
    <img src="<?php echo base_url('public/image.png') ?>" alt="">
  </div>
  <div class="frame">
    <div class="frame-1">
      <h1>CHANGE PASSWORD</h1>
      <hr>
      <h3>JENDELA WISATA</h3>
      <h5 class="mb-4"><?php echo $this->session->userdata('email') ?></h5>
    </div>
    <div class="alert">
      <?php echo $this->session->flashdata('pesan'); ?>
    </div>
    <div class="frame-2">
      <div class="form-floating mb-1">
        <input type="password" class="form-control" id="floatingInput" placeholder="Reset Password" name="password">
        <?php echo form_error('password', '<small class="text-danger p-3" >', '</small>'); ?>
        <label for="floatingInput">RESET PASSWORD</label>
      </div>
      <div class="form-floating mb-1">
        <input type="password" class="form-control" id="floatingInput" placeholder="Reapet Password" name="password1">
        <?php echo form_error('password1', '<small class="text-danger p-3" >', '</small>'); ?>
        <label for="floatingInput">REAPET PASSWORD</label>
      </div>

      <div class="input">
        <button type="submit" class="btn btn-secondary">SIGN</button>
      </div>
    </div>
  </div>
</form>