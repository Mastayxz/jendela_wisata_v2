<!-- Meta -->
<?php $this->load->view('template/meta') ?>
<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('template/navbar') ?>

    <!-- Main Sidebar Container -->
    <?php $admin_name = $this->session->userdata('admin_name'); ?>
    <?php $this->load->view('template/sidebar', ['admin_name' => $admin_name]); ?>


    <!-- Main content -->

    <body>
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">Tambah Data Akomodasi</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/akomodasi/add') ?>">
                        <div class="form-group">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" name="nama_akomodasi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori" class="form-label">Jenis </label>
                            <select name="id_jenis_akomodasi" class="form-control" required>
                                <option value="semua">semua</option>
                                <?php foreach ($jenis_akomodasi_list as $ja) : ?>
                                    <option value="<?= $ja->id_jenis_akomodasi; ?>"><?= $ja->nama_jenis_akomodasi; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Harga</label>
                            <input type="text" name="harga_akomodasi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat_akomodasi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Lokasi </label>
                            <textarea class="form-control" name="lokasi_akomodasi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Deskripsi </label>
                            <textarea class="form-control" name="deskripsi_akomodasi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="id_tempat_wisata" class="form-label">Tempat Wisata</label>
                            <select name="id_tempat_wisata" class="form-control">
                                <option value="semua">semua</option>
                                <?php foreach ($tempat_wisata_list as $tw) : ?>
                                    <option value="<?= $tw->id_tempat_wisata; ?>"><?= $tw->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 1</label>
                            <input type="file" name="gambar_akomodasi[]" class="form-control" required min="1">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 2</label>
                            <input type="file" name="gambar_akomodasi[]" class="form-control" required min="1">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 3</label>
                            <input type="file" name="gambar_akomodasi[]" class="form-control" required min="1">
                        </div>
                        <button type="submit" class="btn btn-primary my-4">Simpan</button>
                        <button type="reset" class="btn btn-danger my-4">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <!-- Footer -->
    <?php $this->load->view('template/footer') ?>

</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('template/js') ?>
</body>

</html>