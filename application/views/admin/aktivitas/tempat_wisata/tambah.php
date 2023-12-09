<!-- Meta -->
<?php $this->load->view('template/meta') ?>

<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>

<!-- Main Sidebar Container -->
<?php $admin_name = $this->session->userdata('admin_name'); ?>
<?php $this->load->view('template/sidebar', ['admin_name' => $admin_name]); ?>




<body>
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">Tambah Data Destinasi</div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/tempatwisata/add') ?>">
          <div class="form-group">
            <label for="" class="form-label">Nama Destinasi</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="id_kategori" class="form-label">Kategori</label>
            <?php foreach ($kategori_list as $kategori) : ?>
              <div class="form-check">
                <input type="checkbox" name="id_kategori[]" value="<?= $kategori->id_kategori; ?>">
                <label class="form-check-label"><?= $kategori->nama_kategori; ?></label>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="form-group">
            <label for="" class="form-label">Biaya Masuk</label>
            <input type="text" name="biaya" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="" class="form-label">Alamat</label>
            <textarea id="alamat" class="form-control" name="alamat" rows="3" required></textarea>
            <!-- <button type="button" onclick="getCoordinate()">Dapatkan Koordinat</button> -->
          </div>
          <div class="form-group">
            <label for="" class="form-label">Deskripsi</label>
            <textarea id="alamat" class="form-control" name="deskripsi" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="" class="form-label">Lokasi</label>
            <textarea id="" class="form-control" name="lokasi" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="" class="form-label">Gambar</label>
            <input type="file" name="gambar[]" class="form-control" required min="1">
          </div>
          <div class="form-group">
            <label for="" class="form-label">Gambar 2</label>
            <input type="file" name="gambar[]" class="form-control" required min="1">
          </div>
          <div class="form-group">
            <label for="" class="form-label">Gambar 3</label>
            <input type="file" name="gambar[]" class="form-control" required min="1">
          </div>
          <button type="submit" class="btn btn-primary my-4">Simpan</button>
          <button type="resett" class="btn btn-danger my-4">Reset</button>
          <!-- <a href="<?php echo base_url()  ?>" class="btn btn-secondary">Kembali</a> -->

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


</html>