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
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/tempatWisata/tambah'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Akomodasi</a>
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
                <!-- Form untuk filter berdasarkan kategori -->
                <form method="post" action="<?= base_url('admin/tempatWisata/filterByCategory') ?>">
                    <div class="form-group">
                        <label for="filter_kategori">Filter Kategori:</label>
                        <select name="filter_kategori" id="filter_kategori" class="form-control">
                            <option value="">-- Semua Kategori --</option>
                            <?php foreach ($kategori_list as $kategori) : ?>
                                <option value="<?= $kategori->id_kategori; ?>"><?= $kategori->nama_kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Filter</button> -->
                </form>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>Biaya Masuk</th>
                                <th>Alamat</th>
                                <th>Lokasi</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Gambar 1</th>
                                <th>Gambar 2</th>
                                <th>Gambar 3 </th>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Script AJAX untuk pembaruan data event
            $.ajax({
                url: "<?= base_url('admin/tempatWisata/search_ajax') ?>",
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
                        url: "<?= base_url('admin/tempatWisata/search_ajax') ?>",
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
            // Event untuk memproses perubahan pada dropdown kategori
            function filterData() {
                var kategori_id = $('#filter_kategori').val();
                $.ajax({
                    url: "<?= base_url('admin/tempatWisata/filterByCategory') ?>",
                    type: "POST",
                    data: {
                        filter_kategori: kategori_id
                    },
                    success: function(data) {
                        $('#search_results').html(data);
                    }
                });
            }

            // Event for processing changes in the category dropdown
            $('#filter_kategori').on('change', function() {
                filterData(); // Call filterData here
            });
        });
    </script>
    <!-- Footer -->

    <!-- JS -->
    <?php $this->load->view('template/js') ?>

    <!-- content -->