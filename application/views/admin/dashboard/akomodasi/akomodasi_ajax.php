<?php if (!empty($akomodasi)) : ?>
    <?php $no = 1; ?>
    <?php foreach ($akomodasi as $ak) : ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $ak->nama_akomodasi; ?></td>
            <td><?= $ak->nama_jenis_akomodasi; ?></td>
            <td>Rp. <?= number_format($ak->harga_akomodasi); ?> </td>
            <td><?= $ak->alamat_akomodasi; ?></td>

            <td>
                <div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; max-height:300px;">
                    <?= $ak->lokasi_akomodasi; ?>
                </div>
            </td>
            <td>
                <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; max-height:300px;">
                    <?= $ak->deskripsi_akomodasi; ?>
                </div>
            </td>
            <td><?= $ak->nama_tempat_wisata; ?></td>
            <td>
                <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; max-height:300px;">
                    <?= $ak->fasilitas_akomodasi; ?>
                </div>
            </td>
            <td><img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi1; ?>" width="100" alt=""></td>
            <td><img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi2; ?>" width="100" alt=""></td>
            <td><img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi3; ?>" width="100" alt=""></td>

            <td>
                <button class="btn btn-warning edit-btn" data-id="<?= $ak->id_akomodasi; ?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit text-light"></i></button>
                <button class="btn btn-danger delete-btn" data-id="<?= $ak->id_akomodasi ?>"><i class="fa fa-trash"></i></button>
                <!-- Modal Edit -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Data Destinasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Tempat untuk menampilkan formulir edit -->
                                <div id="editFormContainer"></div>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="9">Tidak ada hasil pencarian.</td>
    </tr>
<?php endif; ?>





<!-- SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Periksa apakah Bootstrap dan jQuery dimuat dengan benar -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Tambahkan link Bootstrap -->


<script>
    $(document).ready(function() {
        $('.delete-btn').on('click', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete URL or perform AJAX delete
                    window.location.href = "<?= base_url('admin/akomodasi/delete/'); ?>" + id;
                }
            });
        });
    });
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');

            // Kirim permintaan AJAX untuk mendapatkan data destinasi berdasarkan ID
            $.ajax({
                url: '<?= base_url('admin/akomodasi/get_detail/') ?>' + id,
                method: 'GET',
                dataType: 'html',
                success: function(response) {
                    // Tampilkan formulir edit di dalam modal
                    $('#editFormContainer').html(response);
                },
                error: function() {
                    alert('Gagal mengambil data destinasi.');
                }
            });
        });
    });
</script>