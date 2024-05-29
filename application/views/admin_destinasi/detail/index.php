<!-- Meta -->
<?php $this->load->view('template/meta', $page_title); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/nav.css') ?>"> -->
<!-- Navbar -->
<?php $this->load->view('templates/navbar'); ?>

<!-- Main Sidebar Container -->
<?php $this->load->view('templates/sidebar', $admin_data); ?>


<?php if (!empty($tempat_wisata)) : ?>
    <div class="container-fluid">
        <div class="row justify-content-start my-4 ">
            <div class="col-md-3">
                <img src="<?= base_url() . '/upload/destinasi/' . $tempat_wisata['gambar1']; ?>" width="400" height="300" alt="gambar1">
            </div>
            <div class="col-md-3">
                <img src="<?= base_url() . '/upload/destinasi/' . $tempat_wisata['gambar2']; ?>" width="400" height="300" alt="gambar1">
            </div>1
            <div class="col-md-3">
                <img src="<?= base_url() . '/upload/destinasi/' . $tempat_wisata['gambar3']; ?>" width="400" height="300" alt="gambar1">
            </div>
        </div>
        <div class="row mb-3 justify-content-start">
            <div class="col-lg-9 ">
                <a href="<?= base_url('admin_ako/dashboard'); ?>" class="btn btn-info"><span data-feather="arrow-left"></span> Go back</a>
                <button class="btn btn-warning edit-btn" data-id="<?= $admin_data['tempat_wisata']; ?>" data-toggle="modal" data-target="#editModal">Edit</button>
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data Akomodasi</h5>
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

        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Stok Tiket</th>
                        <th>Fasilitas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><?php echo $tempat_wisata['id_tempat_wisata']; ?></td>
                        <td><?php echo $tempat_wisata['nama_tempat_wisata']; ?></td>
                        <td>Rp. <?php echo number_format($tempat_wisata['biaya_tempat_wisata']); ?></td>
                        <td><?php echo $tempat_wisata['alamat_tempat_wisata']; ?></td>
                        <td class="d-flex">
                            <div style="max-width: 100px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                <?php echo $tempat_wisata['deskripsi_tempat_wisata']; ?>
                            </div>
                        </td>
                        <td><?php echo $tempat_wisata['stok_tiket']; ?></td>
                        <td class="d-flex">
                            <div style="max-width: 100px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                <?= $tempat_wisata['fasilitas_tempat_wisata']; ?>
                            </div>
                        </td>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>


<?php else : ?>
    <p>Data event tidak ditemukan.</p>
<?php endif; ?>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Check if the admin has logged in
    <?php if ($this->session->userdata('admin_data') && !$this->session->userdata('welcome_popup_shown')) : ?>
        // Display a welcome popup
        Swal.fire({
            title: 'Welcome, <?= $admin_name ?>!',
            text: 'Here is the dashboard for Jendela Wisata.',
            icon: 'success',
            confirmButtonText: 'OK'
        });

        // Set a session variable to indicate that the popup has been shown
        <?php $this->session->set_userdata('welcome_popup_shown', true); ?>
    <?php endif; ?>

    // Your existing script for other functionalities
</script>
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
                url: '<?= base_url('admin/tempatwisata/edit/') ?>' + id,
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
<!-- Footer -->
<?php $this->load->view('template/footer') ?>

<!-- JS -->
<?php $this->load->view('template/js') ?>