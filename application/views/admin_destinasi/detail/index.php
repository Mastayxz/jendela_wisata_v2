<!-- Meta -->
<?php $this->load->view('template/meta', $page_title); ?>
<!-- Navbar -->
<?php $this->load->view('templates/navbar'); ?>

<!-- Main Sidebar Container -->
<?php $this->load->view('templates/sidebar', $admin_data); ?>

<div class="container-fluid mt-4">
    <?php if (!empty($tempat_wisata)) : ?>
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2>Detail Tempat Wisata</h2>
            </div>
        </div>
        <div class="row justify-content-start mb-4">
            <?php if (!empty($tempat_wisata['gambar1'])) : ?>
                <div class="col-md-4 mb-3">
                    <img src="<?= base_url() . 'upload/destinasi/' . $tempat_wisata['gambar1']; ?>" class="img-fluid img-thumbnail" alt="gambar1">
                </div>
            <?php endif; ?>
            <?php if (!empty($tempat_wisata['gambar2'])) : ?>
                <div class="col-md-4 mb-3">
                    <img src="<?= base_url() . 'upload/destinasi/' . $tempat_wisata['gambar2']; ?>" class="img-fluid img-thumbnail" alt="gambar2">
                </div>
            <?php endif; ?>
            <?php if (!empty($tempat_wisata['gambar3'])) : ?>
                <div class="col-md-4 mb-3">
                    <img src="<?= base_url() . 'upload/destinasi/' . $tempat_wisata['gambar3']; ?>" class="img-fluid img-thumbnail" alt="gambar3">
                </div>
            <?php endif; ?>
        </div>
        <div class="row mb-3 justify-content-start">
            <div class="col-lg-9">
                <a href="<?= base_url('admin_ako/dashboard'); ?>" class="btn btn-info"><span data-feather="arrow-left"></span> Go back</a>
                <button class="btn btn-warning edit-btn" data-id="<?= $tempat_wisata['id_tempat_wisata']; ?>" data-toggle="modal" data-target="#editModal">Edit</button>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th style="width: 20%;">Deskripsi</th>
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
                        <td>
                            <div style="max-width: 200px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                <?php echo $tempat_wisata['deskripsi_tempat_wisata']; ?>
                            </div>
                        </td>
                        <td><?php echo $tempat_wisata['stok_tiket']; ?></td>
                        <td>
                            <?php
                            $fasilitas = explode(',', $tempat_wisata['fasilitas_tempat_wisata']);
                            foreach ($fasilitas as $fasilitas_item) {
                                echo '<div><i class="fas fa-check"></i> ' . trim($fasilitas_item) . '</div>';
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col-12">
                <p>Data tempat wisata tidak ditemukan.</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Tempat Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tempat untuk menampilkan formulir edit -->
                <div id="editFormContainer"></div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Check if the admin has logged in
    <?php if ($this->session->userdata('admin_data') && !$this->session->userdata('welcome_popup_shown')) : ?>
        // Display a welcome popup
        Swal.fire({
            title: 'Welcome, <?= $admin_data['nama'] ?>!',
            text: 'Here is the dashboard for Jendela Wisata.',
            icon: 'success',
            confirmButtonText: 'OK'
        });

        // Set a session variable to indicate that the popup has been shown
        <?php $this->session->set_userdata('welcome_popup_shown', true); ?>
    <?php endif; ?>

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
                    window.location.href = "<?= base_url('admin/event/delete/'); ?>" + id;
                }
            });
        });

        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '<?= base_url('admin/tempatwisata/edit/') ?>' + id,
                method: 'GET',
                dataType: 'html',
                success: function(response) {
                    $('#editFormContainer').html(response);
                },
                error: function() {
                    Swal.fire('Error', 'Gagal mengambil data destinasi.', 'error');
                }
            });
        });
    });
</script>

<!-- Footer -->
<?php $this->load->view('template/footer') ?>

<!-- JS -->
<?php $this->load->view('template/js') ?>