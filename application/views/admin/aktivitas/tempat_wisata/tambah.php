<body>
  <div class="container-fluid">
    <div class="card card-primary">

      <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/tempatwisata/add') ?>">
          <div class="row">
            <!-- Left side with 5 fields -->
            <div class="col-md-6">
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
                <input type="number" name="biaya" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="" class="form-label">Alamat</label>
                <textarea id="alamat" class="form-control" name="alamat" rows="3" required></textarea>
              </div>

              <div class="form-group">
                <label for="" class="form-label">Lokasi</label>
                <textarea id="lokasi" class="form-control" name="lokasi" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label for="" class="form-label">Deskripsi</label>
                <textarea id="fasilitas" class="form-control" name="fasilitas" rows="6" required></textarea>
              </div>
            </div>

            <!-- Right side with 4 fields -->
            <div class="col-md-6 ">

              <div class="form-group">
                <label for="" class="form-label">Gambar 1</label>
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
              <div class="form-group">
                <label for="" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" class="form-control" name="deskripsi" rows="6" required></textarea>
              </div>
            </div>
          </div>

          <!-- Buttons Row -->
          <div class="row justify-content-end">
            <div class="col-md-6">
              <div class="text-right">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-power-off"></i> Cancel</button>

              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>


<!-- Footer -->


</div>
<!-- ./wrapper -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Add this script at the end of your HTML file -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Find the form element
    var form = document.querySelector('form');

    // Add a submit event listener to the form
    form.addEventListener('submit', function(event) {
      // Prevent the default form submission
      event.preventDefault();

      // Show a SweetAlert confirmation dialog
      Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to save this data?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it!'
      }).then((result) => {
        // If the user clicks on "Yes, save it!"
        if (result.isConfirmed) {
          // Submit the form programmatically
          form.submit();
        }
      });
    });
  });
</script>
<!-- JS -->
<?php $this->load->view('template/js') ?>


</html>