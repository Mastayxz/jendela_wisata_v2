<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/loginadmin.css') ?>">

<form action="<?php echo base_url('c_authadmin/index') ?>" method="post">
  <div class="wrapper">
    <img src="<?php echo base_url('public/image.png') ?>" alt="">
  </div>
  <div class="frame">
    <div class="frame-1">
      <h1>LOGIN</h1>
      <hr>
      <h3>JENDELA WISATA</h3>
    </div>
    <div class="alert">
      <?php echo $this->session->flashdata('pesan'); ?>
    </div>
    <div class="frame-2">
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="floatingInput" placeholder="Email" name="email" value="<?php echo set_value('email') ?>">
        <?php echo form_error('email', '<small class="text-danger p-3" >', '</small>'); ?>
        <label for="floatingInput">EMAIL</label>
      </div>
      <div class="form-floating mb-1">
        <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password" value="<?php echo set_value('password') ?>">
        <?php echo form_error('password', '<small class="text-danger p-3" >', '</small>'); ?>
        <label for="floatingInput">PASSWORD</label>
      </div>
      <div class="input">
        <button type="submit" class="btn btn-secondary">SIGN</button>
      </div>
    </div>
  </div>
</form>