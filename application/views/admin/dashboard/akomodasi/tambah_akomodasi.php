<body>
    <div class="container-fluid">
        <div class="card card-primary">

            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/akomodasi/add') ?>">
                    <div class="row">
                        <!-- Left Column - 5 Fields -->
                        <div class="col-md-6">
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
                                <label for="" class="form-label">Lokasi </label>
                                <textarea class="form-control" name="lokasi_akomodasi" rows="3" required></textarea>
                            </div>


                            <div class="form-group">
                                <label for="" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat_akomodasi" rows="3" required></textarea>
                            </div>
                        </div>

                        <!-- Right Column - 4 Fields -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">fasilitas</label>
                                <textarea class="form-control" name="fasilitas_akomodasi" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="id_tempat_wisata" class="form-label">Tempat Wisata</label>
                                <select name="id_tempat_wisata" class="form-control">
                                    <option value="semua">semua</option>
                                    <?php foreach ($tempat_wisata_list as $tw) : ?>
                                        <option value="<?= $tw->id_tempat_wisata; ?>"><?= $tw->nama_tempat_wisata; ?></option>
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
                            <div class="form-group">
                                <label for="" class="form-label">Deskripsi </label>
                                <textarea class="form-control" name="deskripsi_akomodasi" rows="5" required></textarea>
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
<!-- Footer -->

</div>
<!-- ./wrapper -->
<!-- SweetAlert library -->
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
</body>

</html>