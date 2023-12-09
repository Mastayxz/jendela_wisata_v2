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
                <div class="card-header">Edit Data Destinasi</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/tempatwisata/update') ?>">
                        <input type="hidden" name="id_tempat_wisata" value="<?= $destinasi['id_tempat_wisata']; ?>">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Destinasi</label>
                            <input type="text" name="nama" class="form-control" value="<?= $destinasi['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori" class="form-label">Kategori</label>
                            <?php foreach ($kategori_list as $kategori) : ?>
                                <div class="form-check">
                                    <input type="checkbox" name="id_kategori[]" value="<?= $kategori->id_kategori; ?>" <?php if (in_array($kategori->id_kategori, $selected_kategori)) echo 'checked'; ?>>
                                    <label class="form-check-label"><?= $kategori->nama_kategori; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Biaya Masuk</label>
                            <input type="text" name="biaya" class="form-control" value="<?= $destinasi['biaya']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3" required><?= $destinasi['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="3" required><?= $destinasi['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi" rows="3" required><?= $destinasi['lokasi']; ?></textarea>
                        </div>
                        <!-- Image 1 -->
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 1</label>
                            <input type="hidden" name="old_gambar1" value="<?= $destinasi['gambar1']; ?>">
                            <?php if ($destinasi['gambar1'] != null) : ?>
                                <div>
                                    <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar1']; ?>" width="100" alt="">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="gambar1" class="form-control">
                        </div>

                        <!-- Image 2 -->
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 2</label>
                            <input type="hidden" name="old_gambar2" value="<?= $destinasi['gambar2']; ?>">
                            <?php if ($destinasi['gambar2'] != null) : ?>
                                <div>
                                    <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar2']; ?>" width="100" alt="">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="gambar2" class="form-control">
                        </div>

                        <!-- Image 3 -->
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 3</label>
                            <input type="hidden" name="old_gambar3" value="<?= $destinasi['gambar3']; ?>">
                            <?php if ($destinasi['gambar3'] != null) : ?>
                                <div>
                                    <img src="<?= base_url() . '/upload/destinasi/' . $destinasi['gambar3']; ?>" width="100" alt="">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="gambar3" class="form-control">
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