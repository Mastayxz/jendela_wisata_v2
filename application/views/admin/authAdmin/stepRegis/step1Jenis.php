<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/css/step1jenis.css') ?>">
    <title>Document</title>
    
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
        <!-- ----------- step 2 Akomodasi ---------------- -->
        <form action="<?php echo base_url('c_authadmin/step1') ?>" method="post">
        <div class="frame">
                <div class="page">
                    <div class="form">
                        <select class="form-select" aria-label="Default select example" name="jenisAdmin" value="<?php echo set_value('jenisAdmin') ?>"> 
                            <option value="" selected disabled>Pilih Jenis Akomodasi</option>
                            <option  value="akomodasi">Akomodasi</option>
                            <option  value="event">Event</option>
                            <option  value="destinasi">Destinasi</option>
                            <!-- Tambah option lagi -->
                        </select>
                        <p><?php echo form_error('jenisAdmin','<small class="text-danger ps-1 pt-3 " >', '</small>') ?></p>
                    </div>
                    
                    <div class="button">
                        <input type="submit" value="Next" >
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>