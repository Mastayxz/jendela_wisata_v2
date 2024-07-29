
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/loginAdmin.css') ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
</head>


<body>
    
    <form action="<?php echo base_url('c_authadmin/index') ?>" method="post">
    <div class = "gambar">
        <img src="<?php echo base_url('public/pantaiBali.jpg') ?>" alt="">
    </div>
    <div class = "frameLogin" >
        <div class = "Logo">  
            <h1>JENDELA<br>WISATA</h1>
            <h3>contribution</h3>
        </div>
        <div class="danger"><?php echo $this->session->flashdata('pesan'); ?></div>
        <div class = "form">
            <input id="name" type="text" name="email_or_username" placeholder ="Username or Email" value="<?php echo set_value('email_or_username') ?>" > 
            <p><?php echo form_error('email_or_username','<small class="text-danger mb-1 pb-1 " >', '</small>') ?></p>
            <input id="password" type="password" name = "password" placeholder="Password" > 
            <p><?php echo form_error('password','<small class="text-danger ps-1 mb-1" >', '</small>') ?></p>
            <div class="link">
                <a href="<?php echo base_url('c_authadmin/forgot_password') ?>">Forget Password</a>
                <a href="<?php echo base_url('c_authadmin/step1') ?>">Register</a>
            </div>
            <div class ="button">
                <input id ="login" type="submit" name = "Login" value="Login"> 
            </div>  
        </div>
        
    </div>
    </form>
   
</body>

</html> 
