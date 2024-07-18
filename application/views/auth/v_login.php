<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/login.css') ?>">

<form action="<?php echo base_url('c_auth/index') ?>" method="post">
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
                <input type="text" class="form-control" id="floatingInput" placeholder="Username or Email" name="username_or_email" value="<?php echo set_value('username_or_email') ?>">
                <?php echo form_error('username_or_email', '<small class="text-danger p-3" >', '</small>'); ?>
                <label for="floatingInput">USERNAME OR EMAIL</label>
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password"  value="<?php echo set_value('password') ?>">
                <?php echo form_error('password', '<small class="text-danger p-3" >', '</small>'); ?>
                <label for="floatingInput">PASSWORD</label>  
            </div>
            <!-- menambahkan fungsi melihat password -->
<!-- <div class="showPassword">
    <input type="checkbox" onclick="showPassword()" /> Show Password
    <script>
        function showPassword() {
            let inputPassword = document.getElementById("password");
            if (inputPassword.type === "password") {
                inputPassword.type = "text";
            } else {
                inputPassword.type = "password";
            }
        }
    </script>
</div>

<div class="regis">
    <h6>Don't have an account?</h6>
    <a href="<?php echo base_url('c_auth/register') ?>">Create account</a><br>
    <a href="<?php echo base_url('c_auth/forgot_pass') ?>">Forgot password?</a>
</div>
<div class="input">
    <button type="submit" class="btn btn-secon dary">SIGN</button>
</div>
</div>
</div>
</form>
-->



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/loginAdmin.css') ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>


<body>

    <form action="<?php echo base_url('c_auth/index') ?>" method="post">
        <div class="gambar">
            <img src="<?php echo base_url('public/pantaiBali.jpg') ?>" alt="">
        </div>
        <div class="frameLogin">
            <div class="Logo">
                <h1>JENDELA<br>WISATA</h1>
                <h3>customer</h3>
            </div>
            <div class="danger"><?php echo $this->session->flashdata('pesan'); ?></div>
            <div class="form">
                <input id="name" type="text" name="username_or_email" placeholder="Username or Email" value="<?php echo set_value('email_or_username') ?>">
                <p><?php echo form_error('email_or_username', '<small class="text-danger mb-1 pb-1 " >', '</small>') ?></p>
                <input id="password" type="password" name="password" placeholder="Password">
                <p><?php echo form_error('password', '<small class="text-danger ps-1 mb-1" >', '</small>') ?></p>
                <div class="link">
                    <a href="<?php echo base_url('c_auth/register') ?>">Create account</a><br>
                    <a href="<?php echo base_url('c_auth/forgot_pass') ?>">Forgot password?</a>
                </div>
                <div class="button ">
                    <input id="login" type="submit" name="Login" value="Login">
                </div>
            </div>

        </div>
    </form>

</body>

</html>