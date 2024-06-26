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
        <!-- ----------- step 2 Event ---------------- -->
        <form action="<?php echo base_url('c_authadmin/step2Event') ?>" method="post">
        <div class="frame">
                <div class="page">
                    <div class="form">
                        <input type="text" id="nama_admin" name="nama_admin" placeholder="Name Admin" value="<?php echo set_value('nama_admin') ?>">
                        <p><?php echo form_error('nama_admin','<small class="text-danger ps-1 mt-1 " >', '</small>') ?></p>
                        <input type="text" id="nama_event" name="nama_event" placeholder="Name Event" value="<?php echo set_value('nama_event') ?>">
                        <p><?php echo form_error('nama_event','<small class="text-danger ps-1 mt-1 " >', '</small>') ?></p>
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