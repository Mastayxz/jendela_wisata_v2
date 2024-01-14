<!-- Meta -->
<?php $this->load->view('template/meta') ?>
<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>
<!-- Main Sidebar Container -->
<?php $this->load->view('template/sidebar'); ?>

<div class="row">
    <div class="col-12">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" id="tambahModalBtn">Tambah Data</button>


                <!-- modal -->
                <!-- Modal Tambah Data -->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Jenis Akomodasi</h5>
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



                <!-- <a href="<?= base_url('admin/kategori/tambahkategori'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a> -->
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px; height:0px;">
                        <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Search" style="width: 200px; height:40px;">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="search_results">

                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
<!-- Footer -->
<?php $this->load->view('template/footer') ?>


<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function() {
        // Script AJAX untuk pembaruan data event
        $.ajax({
            url: "<?= base_url('admin/search/searchKategori') ?>",
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
                    url: "<?= base_url('admin/search/searchKategori') ?>",
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
            url: '<?= base_url('admin/kategori/tambahkategori/') ?>',
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

<?php $this->load->view('template/js') ?>

<!-- content -->

</html>