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
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Event And Activity</h5>
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
            <form method="post" action="<?= base_url('user/filter/filter_event') ?>" id="filterForm">
                <div class="row mx-3">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="filter_kategori" class="form-label mt-4">Alamat </label>
                            <input type="text" name="alamat_event" id="alamat_event" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="filter_kategori" class="form-label mt-4">Jam Buka</label>
                            <input type="time" name="jam_buka" id="jam_buka" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="filter_kategori" class="form-label mt-4">Jam Tutup</label>
                            <input type="time" name="jam_tutup" id="jam_tutup" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="filter_kategori" class="form-label mt-4">Harga maksimum </label>
                            <input type="text" name="price" id="price" placeholder="Masukan Harga" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- <button type="submit" class="btn btn-primary">Filter</button> -->
            </form>

            <!-- Tampilkan Hasil Pencarian atau Semua Data -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Biaya</th>
                            <th>Alamat Event</th>
                            <th>Deskripsi</th>
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
<?php $this->load->view('template/footer') ?>
<!-- Footer -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Sertakan script JavaScript yang telah Anda buat -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function() {
        // Script AJAX untuk pembaruan data event
        $.ajax({
            url: "<?= base_url('admin/search/search_event') ?>",
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
                    url: "<?= base_url('admin/search/search_event') ?>",
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

        // Event untuk memproses filter secara otomatis saat input berubah
        $('#filterForm input').on('input', function() {
            // Mengumpulkan data dari setiap elemen formulir
            var alamat_event = $('#alamat_event').val();
            var jam_buka = $('#jam_buka').val();
            var jam_tutup = $('#jam_tutup').val();
            var price = $('#price').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/filter/filter_event') ?>',
                data: {
                    alamat_event: alamat_event,
                    jam_buka: jam_buka,
                    jam_tutup: jam_tutup,
                    price: price
                },
                success: function(data) {
                    $('#search_results').html(data);
                }
            });
        });

    });

    function loadFormTambahData() {
        // Kirim permintaan AJAX untuk mendapatkan formulir tambah data
        $.ajax({
            url: '<?= base_url('admin/event/tambah/') ?>',
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('pesan')) : ?>
            // Tampilkan notifikasi jika ada pesan flashdata
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= $this->session->flashdata("pesan") ?>',
            });
        <?php endif; ?>
    });
</script>



<!-- JS -->
<?php $this->load->view('template/js') ?>

<!-- content -->