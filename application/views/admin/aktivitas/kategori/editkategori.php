<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGUBAHAN DATA</title>
</head>
<body>
    <h1>UBAH DATA</h1>
    <table>
        <form action="<?php echo base_url('kategori/editkategori') ?>" method="post">
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><input readonly="" type="text" name="id_kategori" id="" value="<?php echo $kategori['id_kategori'] ?>"></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>:</td>
            <td><input type="text" name="nama_kategori" id="" value="<?php echo $kategori['nama_kategori'] ?>"></td>
        </tr>
        <tr>
            <td><button type="submit">Simpan</button></td>
        </tr>
    </form>
    </table>
</body>
</html>