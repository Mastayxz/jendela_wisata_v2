<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar</title>
</head>

<body>
    <h2>Detail Kamar</h2>
    <?php if (!empty($detail)) : ?>
        <p>Tipe Kamar: <?= $detail->tipe_kamar ?></p>
        <p><img src="<?= $detail->gambar ?>" alt="<?= $detail->tipe_kamar ?>" width="200"></p>
        <p>Jumlah: <?= $detail->jumlah ?></p>
        <a href="<?= base_url('admin_ako/   kamarakomodasi/index/' . $detail->id_akomodasi) ?>">Kembali ke Daftar Kamar</a>
    <?php else : ?>
        <p>Detail kamar tidak ditemukan.</p>
    <?php endif; ?>
</body>

</html>