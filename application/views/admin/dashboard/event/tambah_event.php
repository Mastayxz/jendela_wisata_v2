<body>
    <div class="container-fluid">
        <div class="card card-primary">

            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/event/add') ?>">
                    <div class="row">
                        <!-- Left Column - 5 Fields -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Nama Event</label>
                                <input type="text" name="nama_event" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Biaya</label>
                                <input type="number" name="biaya_event" class="form-control" required min="1">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Alamat Event</label>
                                <textarea class="form-control" name="alamat_event" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Deskripsi Event</label>
                                <textarea class="form-control" name="deskripsi_event" rows="3" required></textarea>
                            </div>

                        </div>

                        <!-- Right Column - 4 Fields -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Fasilitas Event</label>
                                <textarea class="form-control" name="fasilitas_event" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Jam Buka</label>
                                <input type="time" name="jam_buka" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Jam Tutup</label>
                                <input type="time" name="jam_tutup" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Tanggal Event</label>
                                <input type="date" name="tanggal_event" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_tempat_wisata" class="form-label">Tempat Wisata</label>
                                <select name="id_tempat_wisata" class="form-control" required>
                                    <?php foreach ($tempat_wisata_list as $tw) : ?>
                                        <option value="<?= $tw->id_tempat_wisata; ?>"><?= $tw->nama_tempat_wisata; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Gambar</label>
                                <input type="file" name="gambar" class="form-control" required>
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
</body>

</html>