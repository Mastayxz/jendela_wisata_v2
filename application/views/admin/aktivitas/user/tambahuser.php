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
        <form action="<?php echo base_url('user/adduser') ?>" method="post">
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="email" id=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="password" id=""></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" id=""></td>
        </tr>
        <tr>
            <td><button type="submit">Simpan</button></td>
        </tr>
    </form>
    </table>
</body>
</html>
