<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($destinasi) && !empty($destinasi)) : ?>
        <h2>Hasil Filter:</h2>
        <table>
            <tr>
                <th>Nama Tempat</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Harga</th>

            </tr>
            <?php foreach ($destinasi as $d) : ?>
                <tr>
                    <td><?= $d->nama_tempat; ?></td>
                    <td><?= $d->kategori_tempat; ?></td>
                    <td><?= $d->lokasi_tempat; ?></td>
                    <td><?= $d->harga_trmpat; ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>