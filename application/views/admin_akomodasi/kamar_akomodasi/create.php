<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar</title>
</head>

<body>
    <h2>Tambah Kamar</h2>
    <form action="<?= base_url('admin_ako/kamarakomodasi/create/' . $id_akomodasi) ?>" method="post">
        <input type="hidden" name="id_akomodasi" value="<?= $id_akomodasi ?>">

        <label for="tipe_kamar">Tipe Kamar:</label>
        <input type="text" name="tipe_kamar" id="tipe_kamar" required><br>

        <label for="gambar">Gambar:</label>
        <input type="text" name="gambar" id="gambar" required><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" required><br>

        <label for="harga">harga:</label>
        <input type="number" name="harga" id="harga" required><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>