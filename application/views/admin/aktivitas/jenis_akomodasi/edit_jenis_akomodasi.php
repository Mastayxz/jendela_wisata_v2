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
        <form action="<?php echo base_url('jenis_akomodasi/editjenis_akomodasi') ?>" method="post">
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><input readonly="" type="text" name="id_jenis_akomodasi" id="" value="<?php echo $jenis_akomodasi['id_jenis_akomodasi'] ?>"></td>
        </tr>
        <tr>
            <td>Jenis Akomodasi</td>
            <td>:</td>
            <td><input type="text" name="jenis_akomodasi" id="" value="<?php echo $jenis_akomodasi['jenis_akomodasi'] ?>"></td>
        </tr>
        <tr>
            <td><button type="submit">Simpan</button></td>
        </tr>
    </form>
    </table>
</body>
</html>