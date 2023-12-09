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
        <form action="<?php echo base_url('user/edituser') ?>" method="post">
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><input readonly="" type="text" name="id_user" id="" value="<?php echo $user['id_user'] ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="email" id="" value="<?php echo $user['email'] ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="password" id="" value="<?php echo $user['password'] ?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" id="" value="<?php echo $user['nama'] ?>"></td>
        </tr>
        <tr>
            <td><button type="submit">Simpan</button></td>
        </tr>
    </form>
    </table>
</body>
</html>