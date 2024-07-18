<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/loginadmin.css') ?>">

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
</form> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/loginAdmin.css') ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>


<body>

  <form action="<?php echo base_url('c_authadminsistem/index') ?>" method="post">
    <div class="gambar">
      <img src="<?php echo base_url('public/pantaiBali.jpg') ?>" alt="">
    </div>
    <div class="frameLogin">
      <div class="Logo">
        <h1>JENDELA<br>WISATA</h1>
        <h3>administrator</h3>
      </div>
      <div class="danger"><?php echo $this->session->flashdata('pesan'); ?></div>
      <div class="form">
        <input id="name" type="text" name="email" placeholder="email" value="<?php echo set_value('email') ?>">
        <p><?php echo form_error('email', '<small class="text-danger mb-1 pb-1 " >', '</small>') ?></p>
        <input id="password" type="password" name="password" placeholder="Password">
        <p><?php echo form_error('password', '<small class="text-danger ps-1 mb-1" >', '</small>') ?></p>
        <div class="link">
          <!-- <a href="#">Forget Password</a> -->
          <!-- <a href="<?php echo base_url('c_authadmin/step1') ?>">Register</a> -->
        </div>
        <div class="button">
          <input id="login" type="submit" name="Login" value="Login">
        </div>
      </div>

    </div>
  </form>

</body>

</html>