<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/forgot.css') ?>">

<form action="<?php echo base_url('c_auth/forgot_pass') ?>" method="post">
    <div class="wrapper">
        <img src="<?php echo base_url('public/image.png') ?>" alt="">
    </div>
    <div class="frame">
        <div class="frame-1">
            <h1>FORGOT PASSWORD</h1>
            <hr>
            <h3>JENDELA WISATA</h3>
        </div>
        <div class="alert">
            <?php echo $this->session->flashdata('pesan'); ?>
        </div>
        <div class="frame-2">
            <div class="form-floating mb-1">
                <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" value="<?php echo set_value('email') ?>">
                <?php echo form_error('email', '<small class="text-danger p-3" >', '</small>'); ?>
                <label for="floatingInput">EMAIL</label>
            </div>

            <div class="regis">
                <a href="<?php echo base_url('c_auth/index') ?>">back to login</a><br>
            </div>
            <div class="input">
                <button type="submit" class="btn btn-secondary">SIGN</button>
            </div>
        </div>
    </div>
</form>