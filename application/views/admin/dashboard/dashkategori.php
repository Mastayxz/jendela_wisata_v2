<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA KATEGORI</title>
</head>
<body>
<h1>DATA KATEGORI</h1>
    <a href="kategori/tambahkategori">Tambahkan Data</a>
    <table class="table table-dark" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($kategori->result_array() as $u) :
                    ?>
                    <tr>
                        <td><?php echo $u['id_kategori']; ?></td>
                        <td><?php echo $u['nama_kategori'] ?></td>
                        <td>
                            <a href="<?php echo base_url('kategori/deletekategori/'.$u['id_kategori']) ?>">Hapus</a>
                            <a href="<?php echo base_url('kategori/ubahkategori/'.$u['id_kategori']) ?>">Ubah</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
</body>
</html>
