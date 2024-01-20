<?php if (!empty($admin)) : ?>
    <?php $no = 1; ?>
    <?php foreach ($admin as $a) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $a->email; ?></td>
            <td><?= $a->username; ?></td>
            <td><?= $a->password; ?></td>
            <td><?= $a->nama_admin; ?></td>

            <td>
                <button class="btn btn-warning edit-btn" data-id="<?= $a->id_admin; ?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit text-light"></i></button>
                <button class="btn btn-danger delete-btn" data-id="<?= $a->id_admin; ?>"><i class="fa fa-trash"></i></button>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Data Admin</h5>
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
                    window.location.href = "<?= base_url('admin/admin/deleteadmin/'); ?>" + id;
                }
            });
        });
    });
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');

            // Kirim permintaan AJAX untuk mendapatkan data destinasi berdasarkan ID
            $.ajax({
                url: '<?= base_url('admin/admin/ubahadmin/') ?>' + id,
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