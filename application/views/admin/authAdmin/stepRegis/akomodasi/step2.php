<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/css/step2.css') ?>">
    
    
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
        <!-- ----------- step 2 akomodasi ---------------- -->
        <form action="<?php echo base_url('c_authadmin/step2Ako') ?>" method="post">
        <div class="frame">
                <div class="page">
                    <div class="form">
                        <input type="text" id="nameAko" name="nama_admin" placeholder="Name Admin">
                        <p><?php echo form_error('nama_admin','<small class="text-danger ps-1 mt-1 " >', '</small>') ?></p>
                        <input type="text" id="nama_akomodasi" name="nama_akomodasi" placeholder="Name Akomodasi">
                        <p><?php echo form_error('nama_akomodasi','<small class="text-danger ps-1 mt-1 " >', '</small>') ?></p>
                        
                    </div>
                    <div class="button">
                        <input type="button" name="Previous" value="Previous" onclick="window.location.href='<?= base_url('c_authadmin/step1') ?>'">
                        <input type="submit" value="Submit" name ="submit">
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html> 