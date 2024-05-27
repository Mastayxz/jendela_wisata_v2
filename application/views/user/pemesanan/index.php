<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
</head>

<body>
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
</body>

</html>