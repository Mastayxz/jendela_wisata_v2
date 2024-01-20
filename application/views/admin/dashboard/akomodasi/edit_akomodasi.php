<body>
    <div class="container-fluid">
        <div class="card card-primary">

            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/akomodasi/update') ?>">
                    <input type="hidden" name="id_akomodasi" value="<?= $akomodasi['id_akomodasi']; ?>">

                    <div class="row">
                        <!-- Left Column - 5 Fields -->
                        <div class="col-md-6">
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
                                <label for="" class="form-label">Harga</label>
                                <input type="number" name="harga_akomodasi" class="form-control" value="<?= $akomodasi['harga_akomodasi']; ?>" required>
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
                                <textarea class="form-control" name="deskripsi_akomodasi" rows="5" required><?= $akomodasi['deskripsi_akomodasi']; ?></textarea>
                            </div>
                        </div>

                        <!-- Right Column - 4 Fields -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">fasilitas</label>
                                <textarea class="form-control" name="fasilitas_akomodasi" rows="3" required><?= $akomodasi['fasilitas_akomodasi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="id_tempat_wisata" class="form-label">Tempat Wisata</label>
                                <select name="id_tempat_wisata" class="form-control">
                                    <?php foreach ($tempat_wisata_list as $tw) : ?>
                                        <?php if ($tw->id_tempat_wisata == $akomodasi['id_tempat_wisata']) : ?>
                                            <option value="<?= $tw->id_tempat_wisata; ?>" selected><?= $tw->nama_tempat_wisata; ?></option>
                                        <?php else :  ?>
                                            <option value="<?= $tw->id_tempat_wisata; ?>"><?= $tw->nama_tempat_wisata; ?></option>
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