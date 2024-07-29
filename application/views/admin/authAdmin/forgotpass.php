
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/forgetstyle.css') ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
</head>


<body>
    
    <form action="<?php echo base_url('c_authadmin/forgot_password') ?>" method="post">
    <div class = "gambar">
        <img src="<?php echo base_url('public/pantaiBali.jpg') ?>" alt="">
    </div>
    <div class = "frameLogin" >
        <div class = "Logo">  
            <h1>JENDELA<br>WISATA</h1>
            <h3>contribution</h3>
        </div>
        
        <div class = "form">
            <input id="email" type="email" name = "email" placeholder="email" > 
            <p><?php echo form_error('email','<small class="text-danger mb-2 pb-2 " >', '</small>') ?></p>
            <div class ="button">
                <input id ="send" type="submit" name ="send" value="Send"> 
            </div>  
        </div>
        
    </div>
    </form>
   
</body>

</html> 
