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
                <div class="card-header">Tambah Data Event/Aktivitas</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/event/add') ?>">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Event</label>
                            <input type="text" name="nama_event" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Biaya</label>
                            <input type="number" name="biaya_event" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Alamat Event</label>
                            <textarea class="form-control" name="alamat_event" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Jam Buka</label>
                            <input type="time" name="jam_buka" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Jam Tutup</label>
                            <input type="time" name="jam_tutup" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="id_tempat_wisata" class="form-label">Tempat Wisata</label>
                            <select name="id_tempat_wisata" class="form-control">
                                <?php foreach ($tempat_wisata_list as $tw) : ?>
                                    <option value="<?= $tw->id_tempat_wisata; ?>"><?= $tw->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" required min="1">
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