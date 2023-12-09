<!-- Meta -->
<?php $this->load->view('template/meta') ?>
<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>
<!-- Main Sidebar Container -->
<?php $admin_name = $this->session->userdata('admin_name'); ?>
<?php $this->load->view('template/sidebar', ['admin_name' => $admin_name]); ?>

<!-- content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- application/views/admin/dashboard/event.php -->

            <!-- application/views/admin/dashboard/event.php -->

            <div>
                <!-- Form Pencarian -->
                <div class="card-header">
                    <a href="<?= base_url('admin/event/tambah'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Event Atau Activity
                    </a>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 200px; height:0px;">
                            <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Search" style="width: 200px; height:40px;">
                            <div class=" input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tampilkan Hasil Pencarian atau Semua Data -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Biaya</th>
                                <th>Alamat Event</th>
                                <th>Tempat Wisata</th>
                                <th>Jam Buka</th>
                                <th>Jam Tutup</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="search_results">
                            <!-- Hasil pencarian akan ditampilkan di sini -->
                        </tbody>
                    </table>
                </div>
            </div>





        </div>

    </div>
</div>
<!-- Footer -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Sertakan script JavaScript yang telah Anda buat -->
<script>
    $(document).ready(function() {
        // Script AJAX untuk pembaruan data event
        $.ajax({
            url: "<?= base_url('admin/event/search_ajax') ?>",
            type: "POST",
            data: {
                table_search: '' // Kosongkan keyword untuk mendapatkan semua data
            },
            success: function(data) {
                $('#search_results').html(data);
            }
        });

        // Event untuk memproses pencarian secara dinamis
        $('#table_search').on('input', function() {
            var keyword = $(this).val();
            if (keyword.length >= 1 || keyword.length === 0) {
                $.ajax({
                    url: "<?= base_url('admin/event/search_ajax') ?>",
                    type: "POST",
                    data: {
                        table_search: keyword
                    },
                    success: function(data) {
                        $('#search_results').html(data);
                    }
                });
            } else {
                // Clear the results if the keyword is too short
                $('#search_results').html('');
            }
        });
    });
</script>


<!-- JS -->
<!-- <?php $this->load->view('template/js') ?> -->

<!-- content -->