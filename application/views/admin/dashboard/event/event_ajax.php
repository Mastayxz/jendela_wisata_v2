<!-- application/views/admin/dashboard/event_ajax.php -->
<?php if (isset($event) && !empty($event)) : ?>
    <?php $no = 1; ?>
    <?php foreach ($event as $ev) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $ev->nama_event; ?></td>
            <td>Rp. <?= number_format($ev->biaya_event); ?> </td>
            <td><?= $ev->alamat_event; ?></td>
            <td class="d-flex">
                <div style="max-width: 100px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                    <?= $ev->deskripsi_event; ?>
                </div>
            </td>
            <!-- <td><?= $ev->tanggal_event; ?></td> -->
            <td><?= date('F j, Y', strtotime($ev->tanggal_event)); ?></td>
            <td><?= $ev->nama_tempat_wisata ?? ''; ?></td>
            <td><?= $ev->jam_buka; ?></td>
            <td><?= $ev->jam_tutup; ?></td>
            <td class="d-flex">
                <div style="max-width: 100px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                    <?= $ev->fasilitas_event; ?>
                </div>
            </td>
            <td><img src="<?= base_url('upload/event/' . $ev->gambar_event); ?>" width="100" alt=""></td>
            <td>
                <button class="btn btn-warning edit-btn" data-id="<?= $ev->id_event; ?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit text-light"></i></button>
                <button class="btn btn-danger delete-btn" data-id="<?= $ev->id_event; ?>"><i class="fa fa-trash"></i></button>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Data Event And Activity</h5>
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
                    window.location.href = "<?= base_url('admin/event/delete/'); ?>" + id;
                }
            });
        });
    });
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');

            // Kirim permintaan AJAX untuk mendapatkan data destinasi berdasarkan ID
            $.ajax({
                url: '<?= base_url('admin/event/edit/') ?>' + id,
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