<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/css/pemesanan.css') ?>">
    <title>Detail Pemesanan</title>
</head>

<body>

    <!-- halaman form pemesanan -->
    <div class="frame-pemesanan">
        <div class="data-diri">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="nama_tamu" placeholder="name@example.com">
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" name="no_tlp" placeholder="name@example.com">
                <label for="floatingInput">Nomer Telphone</label>
            </div>
        </div>
        <div class="checkin-checkout">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" name="check_in" placeholder="name@example.com">
                <label for="floatingInput">Check In</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" name="check_out" placeholder="name@example.com">
                <label for="floatingInput">Check out</label>
            </div>
        </div>
        <div class="harga">
            <p>Total Harga Rp:----------</p>
        </div>
        <!-- Membuat detail kamar yang di pesan -->
        <?php if (!empty($kamar)): ?>
            <h2>Detail Kamar </h2>
            <?php foreach($kamar as $km): ?>
                <p>Jenis Kamar : <?php echo $km['tipe_kamar']; ?></p>
                <p><?php echo $km['gambar'];?></p>
                <p>Jumlah Kamar :<?php echo $km['jumlah'];?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>Detal Kamar</h2>
            <p>Tidak Tersedia </p>
        <?php endif; ?>
        <!-- detail pemesanan -->
        <div class="pemesanan" >
            <p></p>
            <p>Jumlah Kamar : </p>
            <p>Total harga : </p>
            <div class="input">
            <input type="submit" name ="bayar" value="Bayar">
            </div>
        </div>

    <!-- Detail dari akomodasi yang di pesan -->
        <?php if (!empty($akomodasi)) : ?>
            <h2>Detail Akomodasi</h2>
            <p>Nama Akomodasi: <?php echo $akomodasi['nama_akomodasi']; ?></p>
            <p>Lokasi: <?php echo $akomodasi['lokasi_akomodasi']; ?></p>
            <p>Jenis Akomodasi: <?php echo $akomodasi['harga_akomodasi']; ?></p>
            <!-- Tampilkan detail akomodasi lainnya sesuai kebutuhan -->
        <?php elseif (!empty($event)) : ?>
            <h2>Detail Event</h2>
            <p>Nama Event: <?php echo $event['nama_event']; ?></p>
            <!-- <p>Waktu: <?php echo $event['waktu']; ?></p> -->
            <!-- Tampilkan detail event lainnya sesuai kebutuhan -->
        <?php else : ?>
            <p>Tidak ada detail pemesanan yang tersedia.</p>
        <?php endif; ?>

       
            
    
    </div>
</body>
</html>