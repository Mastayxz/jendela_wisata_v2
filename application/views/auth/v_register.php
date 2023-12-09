<link rel="stylesheet" style="" href="<?php echo base_url('public/css/register.css') ?>">

<form action="<?php echo base_url('c_auth/register') ?>" novalidate method="post">
  <div class="wrapper">
    <img src="<?php echo base_url('public/image.png') ?>">
  </div>
  <div class="frame">
    <div class="frame-judul">
      <h1>REGISTER</h1>
      <hr>
      <h3>JENDELA DUNIA</h3>
    </div>

    <div class="frame-nama">
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" value="<?php echo set_value('username') ?>">
        <?php echo form_error('username', '<small class="text-danger p-3" >', '</small>'); ?>
        <label for="floatingInput">USERNAME</label>
      </div>
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama" value="<?php echo set_value('nama') ?>">
        <label for="floatingInput">NAMA</label>
        <?php echo form_error('nama', '<small class="text-danger p-3" >', '</small>'); ?>

      </div>
    </div>

    <div class="frame-password ">
      <div class="form-floating mb-1">
        <input type="password" class="form-control" id="floatingInput" name="password">
        <label for="floatingInput">PASSWORD</label>
        <?php echo form_error('password', '<small class="text-danger p-3" >', '</small>'); ?>
      </div>
      <div class="form-floating mb-1">
        <input type="password" class="form-control" id="floatingInput" name="password1">
        <label for="floatingInput">CONFRIM PASSWORD</label>
        <?php echo form_error('password', '<small class="text-danger p-3" >', '</small>'); ?>
      </div>
    </div>

    <div class="frame-data">
      <div class="form-floating mb-1">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="<?php echo set_value('email') ?>">
        <label for="floatingInput">EMAIL ADDRESS</label>
        <?php echo form_error('email', '<small class="text-danger p-3" >', '</small>'); ?>
      </div>
      <div class="form-floating mb-1">
        <input type="text" class="form-control" id="floatingInput" name="telephone" value="<?php echo set_value('telephone') ?>">
        <label for="floatingInput">TELEPHONE</label>
        <?php echo form_error('telephone', '<small class="text-danger p-3" >', '</small>'); ?>
      </div>
    </div>

    <div class="tgl_lahir">
      <div class="form-floating mb-1">
        <input type="date" class="form-control" id="floatingInput" name="birthday" value="<?php echo set_value('birthay') ?>">
        <label for="floatingInput">BIRTHDAY</label>
        <?php echo form_error('birthday', '<small class="text-danger p-3" >', '</small>'); ?>
      </div>
      <div class="input">
        <button type="submit" class="btn btn-secondary">SIGN UP</button>
      </div>
    </div>

    <div class="login">
      <a href="<?php echo base_url('c_auth/index') ?>">do you have an account?Login</a>
    </div>

  </div>
</form>