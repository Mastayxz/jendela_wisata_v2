<!-- Meta -->
<?php $this->load->view('template/meta', $page_title); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/nav.css') ?>"> -->
<!-- Navbar -->
<?php $this->load->view('templates/navbar'); ?>

<!-- Main Sidebar Container -->
<?php $this->load->view('templates/sidebar', $admin_data); ?>

<div class="container-fluid">
    <a href="<?= base_url('admin_ako/kamarakomodasi/create/' . $id_akomodasi) ?>" class="btn btn-primary my-4">Tambah Kamar</a>

    <div class="row shadow-md">
        <table class="table">
            <thead>
                <tr>
                    <th>Tipe Kamar</th>
                    <th>Gambar</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kamar as $k) : ?>
                    <tr>
                        <td><?= $k->tipe_kamar ?></td>
                        <td><img src="<?= $k->gambar ?>" alt="<?= $k->tipe_kamar ?>" width="100"></td>
                        <td><?= $k->jumlah ?></td>
                        <td>Rp. <?= number_format($k->harga)  ?></td>
                        <td>
                            <a href="<?= base_url('admin_ako/kamarakomodasi/detail/' . $k->id_kamar) ?>" class="btn btn-info">Detail</a>
                            <a href="<?= base_url('admin_ako/kamarakomodasi/edit/' . $k->id_kamar) ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('admin_ako/kamarakomodasi/delete/' . $k->id_kamar) ?>" onclick="return confirm('Yakin ingin menghapus kamar ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>
</div>

<?php $this->load->view('template/footer') ?>

<!-- JS -->
<?php $this->load->view('template/js') ?>