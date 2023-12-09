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
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/akomodasi/update') ?>">

                        <input type="hidden" name="id_akomodasi" value="<?= $akomodasi['id_akomodasi']; ?>">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Akomodasi</label>
                            <input type="text" name="nama_akomodasi" class="form-control" value="<?= $akomodasi['nama_akomodasi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori" class="form-label">Jenis Akomodasi</label>
                            <select name="id_jenis_akomodasi" class="form-control" required>
                                <?php foreach ($jenis_akomodasi_list as $ja) : ?>
                                    <?php if ($ja->id_jenis_akomodasi == $akomodasi['id_jenis_akomodasi']) : ?>
                                        <option value="<?= $ja->id_jenis_akomodasi; ?>" selected><?= $ja->nama_jenis_akomodasi; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $ja->id_jenis_akomodasi; ?>"><?= $ja->nama_jenis_akomodasi; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Hargai</label>
                            <input type="text" name="harga_akomodasi" class="form-control" value="<?= $akomodasi['harga_akomodasi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat_akomodasi" rows="3" required><?= $akomodasi['alamat_akomodasi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi_akomodasi" rows="3" required><?= $akomodasi['lokasi_akomodasi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Deskripsi </label>
                            <textarea class="form-control" name="deskripsi_akomodasi" rows="3" required><?= $akomodasi['deskripsi_akomodasi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="id_tempat_wisata" class="form-label">Tempat Wisata</label>
                            <select name="id_tempat_wisata" class="form-control">

                                <?php foreach ($tempat_wisata_list as $tw) : ?>
                                    <?php if ($tw->id_tempat_wisata == $akomodasi['id_tempat_wisata']) : ?>
                                        <option value="<?= $tw->id_tempat_wisata; ?>" selected><?= $tw->nama; ?></option>
                                    <?php else :  ?>
                                        <option value="<?= $tw->id_tempat_wisata; ?>"><?= $tw->nama; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Image 1 -->
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 1</label>
                            <input type="hidden" name="old_gambar1" value="<?= $akomodasi['gambar_akomodasi1']; ?>">
                            <?php if ($akomodasi['gambar_akomodasi1'] != null) : ?>
                                <div>
                                    <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi1']; ?>" width="100" alt="">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="gambar_akomodasi1" class="form-control">
                        </div>

                        <!-- Image 2 -->
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 2</label>
                            <input type="hidden" name="old_gambar2" value="<?= $akomodasi['gambar_akomodasi2']; ?>">
                            <?php if ($akomodasi['gambar_akomodasi2'] != null) : ?>
                                <div>
                                    <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi2']; ?>" width="100" alt="">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="gambar_akomodasi2" class="form-control">
                        </div>

                        <!-- Image 3 -->
                        <div class="form-group">
                            <label for="" class="form-label">Gambar 3</label>
                            <input type="hidden" name="old_gambar3" value="<?= $akomodasi['gambar_akomodasi3']; ?>">
                            <?php if ($akomodasi['gambar_akomodasi3'] != null) : ?>
                                <div>
                                    <img src="<?= base_url() . '/upload/akomodasi/' . $akomodasi['gambar_akomodasi3']; ?>" width="100" alt="">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="gambar_akomodasi3" class="form-control">
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