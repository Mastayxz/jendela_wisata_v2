<!DOCTYPE html>
<html>

<head>
    <title>Hasil Filter Tempat Wisata</title>
</head>

<body>
    <h1>Hasil Filter Tempat Wisata</h1>

    <ul>
        <?php foreach ($filtered_wisata as $place) : ?>
            <li>
                Nama Tempat Wisata: <?= $place->nama_tempat; ?><br>
                Harga: <?= $place->harga_tempat; ?><br>
                Lokasi: <?= $place->lokasi_tempat; ?><br>
                Kategori: <?= $place->kategori_tempat; ?><br>
                <!-- Tampilkan informasi lainnya sesuai kebutuhan -->
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>