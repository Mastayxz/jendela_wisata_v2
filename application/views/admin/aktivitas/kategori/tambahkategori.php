<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENAMBAHAN DATA</title>
</head>
<body>
    <h1>TAMBAH DATA</h1>
    <table>
        <form action="<?php echo base_url('kategori/addkategori') ?>" method="post">
        <tr>
            <td>Nama Kategori</td>
            <td>:</td>
            <td><input type="text" name="nama_kategori" id=""></td>
        </tr>
        <tr>
            <td><button type="submit">Simpan</button></td>
        </tr>
    </form>
    </table>
</body>
</html>
