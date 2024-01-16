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
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Akomodasi</h5>
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
                <!-- <a href="<?= base_url('admin/akomodasi/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Akomodasi</a> -->
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
                <section class="ftco-section ftco-no-pb">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-wrap-1 ftco-animate">
                                <form method="post" action="<?= base_url('user/filter/filterByJenisDanHarga') ?>" id="filter-form" class="search-property-1">
                                    <div class="row no-gutters">
                                        <div class="col-lg ">
                                            <div class="form-group p-4 border-0">
                                                <label for="#">Place Name</label>
                                                <div class="form-field">

                                                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="location name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg ">
                                            <div class="form-group p-4">
                                                <label for="#">Minimum Price</label>
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
                                                <label for="#">Accommodation Type</label>
                                                <div class="form-field">
                                                    <div class="select-wrap">

                                                        <select name="filter_jenis" id="filter_jenis" class="form-control">
                                                            <option value="semua">Semua</option>
                                                            <?php foreach ($jenis_akomodasi_list as $ja) : ?>
                                                                <option value="<?= $ja->id_jenis_akomodasi; ?>"><?= $ja->nama_jenis_akomodasi; ?></option>
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

            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Alamat</th>
                            <th>Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Tempat Wisata</th>
                            <th>Fasilitas</th>
                            <th>Gambar 1</th>
                            <th>Gambar 2</th>
                            <th>Gambar 3</th>
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
            url: "<?= base_url('admin/search/search_akomodasi') ?>",
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
                    url: "<?= base_url('admin/search/search_akomodasi') ?>",
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
            var id_jenis_akomodasi = $('#filter_jenis').val();
            $.ajax({
                url: "<?= base_url('admin/filter/filterByJenisAkomodasi') ?>",
                type: "POST",
                data: {
                    filter_jenis: id_jenis_akomodasi
                },
                success: function(data) {
                    $('#search_results').html(data);
                }
            });
        }


        // Event for processing changes in the category dropdown
        $('#filter_jenis').on('change', function() {
            filterData(); // Call filterData here
        });
    });



    function loadFormTambahData() {
        $.ajax({
            url: '<?= base_url('admin/akomodasi/tambah/') ?>',
            method: 'GET',
            dataType: 'html',
            success: function(response) {
                $('#tambahFormContainer').html(response);
                $('#tambahModal').modal('show');
            },
            error: function() {
                alert('Gagal mengambil formulir!');
            }

        });

    }
    $(document).ready(function() {
        $('#tambahModalBtn').on('click', function() {
            loadFormTambahData();
        })
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
</script>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>





<?php $this->load->view('template/footer') ?>

<!-- JS -->
<?php $this->load->view('template/js') ?>

<!-- content -->