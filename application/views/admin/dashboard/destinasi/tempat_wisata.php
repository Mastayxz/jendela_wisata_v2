<!-- Meta -->
<?php $this->load->view('template/meta') ?>
<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>
<!-- Main Sidebar Container -->
<?php $this->load->view('template/sidebar'); ?>
<!-- content -->

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" id="tambahModalBtn">Tambah Data</button>

                <!-- modal -->
                <!-- Modal Tambah Data -->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Destinasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Tempat untuk menampilkan formulir tambah data -->
                                <div id="tambahFormContainer"></div>
                            </div>
                            <div class="modal-footer">
                                <!-- Skrip SweetAlert untuk formulir tambah data -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <a href="<?= base_url('admin/TempatWisata/tambah'); ?>" class="btn btn-primary"> Tambah Destinasi</a> -->
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
                <section class="ftco-section ftco-no-pb">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-wrap-1 ftco-animate">
                                <form method="post" action="<?= base_url('user/filter/filterByJenisDanHarga') ?>" id="filter-form" class="search-property-1">
                                    <div class="row no-gutters">
                                        <div class="col-lg ">
                                            <div class="form-group p-4 border-0">
                                                <label for="#">Location Name</label>
                                                <div class="form-field">

                                                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="location name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg ">
                                            <div class="form-group p-4">
                                                <label for="#">Minim Price</label>
                                                <div class="form-field">

                                                    <input type="text" name="filter_harga_min" id="filter_harga_min" class="form-control" placeholder="min price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg ">
                                            <div class="form-group p-4">
                                                <label for="#">Limit Price</label>
                                                <div class="form-field">

                                                    <input type="text" name="filter_harga_max" id="filter_harga_max" class="form-control" placeholder="max price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg ">
                                            <div class="form-group p-4">
                                                <label for="#">Destination Type</label>
                                                <div class="form-field">
                                                    <div class="select-wrap">

                                                        <select name="filter_kategori" id="filter_kategori" class="form-control">
                                                            <option value="">Semua</option>
                                                            <?php foreach ($kategori_list as $kategori) : ?>
                                                                <option value="<?= $kategori->id_kategori; ?>"><?= $kategori->nama_kategori; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </section>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            // Script AJAX untuk pembaruan data event
            $.ajax({
                url: "<?= base_url('admin/search/search_tempat_wisata') ?>",
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
                        url: "<?= base_url('admin/search/search_tempat_wisata') ?>",
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

            function filterData() {
                var kategori_id = $('#filter_kategori').val();
                var harga_min = $('#filter_harga_min').val();
                var harga_max = $('#filter_harga_max').val();
                var alamat = $('#alamat').val();

                $.ajax({
                    url: "<?= base_url('admin/filter/filter_destinasi') ?>",
                    type: "POST",
                    data: {
                        filter_kategori: kategori_id,
                        filter_harga_min: harga_min,
                        filter_harga_max: harga_max,
                        alamat: alamat
                    },
                    success: function(data) {
                        $('#search_results').html(data);
                    }
                });
            }

            // Event untuk memproses perubahan pada dropdown kategori
            $('#filter_kategori').on('change', function() {
                filterData();
            });

            // Event untuk memproses perubahan pada input harga
            $('#filter_harga_min, #filter_harga_max, #alamat').on('input', function() {
                filterData();
            });
        });

        $(document).ready(function() {
            <?php if ($this->session->flashdata('pesan')) : ?>
                // Tampilkan notifikasi sukses jika ada pesan flashdata
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: '<?= $this->session->flashdata("pesan") ?>',
                });
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')) : ?>
                // Tampilkan notifikasi error jika ada pesan flashdata error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= $this->session->flashdata("error") ?>',
                });
            <?php endif; ?>
        });


        function loadFormTambahData() {
            // Kirim permintaan AJAX untuk mendapatkan formulir tambah data
            $.ajax({
                url: '<?= base_url('admin/TempatWisata/tambah/') ?>',
                method: 'GET',
                dataType: 'html',
                success: function(response) {
                    // Tampilkan formulir tambah data di dalam modal
                    $('#tambahFormContainer').html(response);

                    // Aktifkan modal setelah formulir ditampilkan
                    $('#tambahModal').modal('show');
                },
                error: function() {
                    alert('Gagal mengambil formulir!');
                }
            });
        }

        $(document).ready(function() {
            // Tombol untuk menampilkan modal tambah data
            $('#tambahModalBtn').on('click', function() {
                // Panggil fungsi untuk mengambil dan menampilkan formulir tambah data
                loadFormTambahData();
            });
        });
    </script>

    < <!-- Footer -->





        <!-- JS -->

        <?php $this->load->view('template/js') ?>

        <!-- content -->