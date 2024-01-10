<!-- Meta -->


<!-- Main content -->

<body>
    <div class="container-fluid">
        <div class="card card-primary">

            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/TempatWisata/update') ?>">
                    <div class="row">
                        <input type="hidden" name="id_tempat_wisata" value="<?= $destinasi['id_tempat_wisata']; ?>">
                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="" class="form-label">Nama Destinasi</label>
                                <input type="text" name="nama" class="form-control" value="<?= $destinasi['nama_tempat_wisata']; ?>" required>
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
                                <input type="number" name="biaya" class="form-control" value="<?= $destinasi['biaya_tempat_wisata']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3" required><?= $destinasi['alamat_tempat_wisata']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Lokasi</label>
                                <textarea class="form-control" name="lokasi" rows="3" required><?= $destinasi['lokasi_tempat_wisata']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">

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
                            <div class="form-group">
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3" required><?= $destinasi['deskripsi_tempat_wisata']; ?></textarea>
                            </div>

                        </div>


                    </div>
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

</div>
<!-- ./wrapper -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Add this script at the end of your HTML file -->
<!-- JS -->
<?php $this->load->view('template/js') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find the form element inside the modal
        var form = $('#editModal form');

        // Add a submit event listener to the form
        form.submit(function(event) {
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
                    form.unbind('submit').submit();
                }
            });
        });
    });
</script>


<!-- JS -->
<?php $this->load->view('template/js') ?>
</body>

</html>