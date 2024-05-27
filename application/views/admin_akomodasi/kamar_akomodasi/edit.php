<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar</title>
</head>

<body>
    <h2>Edit Kamar</h2>
    <form action="<?= base_url('kamarakomodasi/edit/' . $detail->id_kamar) ?>" method="post">
        <label for="tipe_kamar">Tipe Kamar:</label>
        <input type="text" name="tipe_kamar" id="tipe_kamar" value="<?= $detail->tipe_kamar ?>" required><br>

        <label for="gambar">Gambar:</label>
        <input type="text" name="gambar" id="gambar" value="<?= $detail->gambar ?>" required><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" value="<?= $detail->jumlah ?>" required><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>