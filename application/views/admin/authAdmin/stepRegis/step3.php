<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/css/step3.css') ?>">
    
    
</head>
<body>
    <div class="image">
        <img src="<?php echo base_url('public/pantaiBali.jpg') ?>" alt="Background Image">
    </div>
    <div class="backgroundBlur">
        <div class="logo">
            <h1>JENDELA<br>WISATA</h1>
            <h3>contribution</h3>
        </div>
        <!-- ----------- step 3 add Password ---------------- -->
        <form action="<?php echo base_url('c_authadmin/step3') ?>" method="post">
        <div class="frame">
                <div class="page">
                    <div class="form">
                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo set_value('email') ?>">
                        <p><?php echo form_error('email','<small class="text-danger ps-1 mt-1 " >', '</small>') ?></p>
                        <input type="text" id="username" name="username" placeholder="Username" value="<?php echo set_value('username') ?>">
                        <p><?php echo form_error('username','<small class="text-danger ps-1 pt-3 " >', '</small>') ?></p>
                    </div>
                    <div class="button">
                        <input type="button" name="Previous" value="Previous" onclick="window.location.href='<?= base_url('c_authadmin/step2Event') ?>'">
                        <input type="submit" value="Submit" name ="submit">
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html> 