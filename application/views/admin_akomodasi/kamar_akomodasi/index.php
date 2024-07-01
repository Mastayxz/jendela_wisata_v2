<!-- Meta -->
<?php $this->load->view('template/meta', $page_title); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/nav.css') ?>"> -->
<!-- Navbar -->
<?php $this->load->view('templates/navbar'); ?>

<!-- Main Sidebar Container -->
<?php $this->load->view('templates/sidebar', $admin_data); ?>

<div class="container-fluid">
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
    <!-- <a href="<?= base_url('admin_ako/kamarakomodasi/create/' . $id_akomodasi) ?>" class="btn btn-primary my-4">Tambah Kamar</a> -->

    <div class="row shadow-md">
        <table class="table">
            <thead>
                <tr>
                    <th>Tipe Kamar</th>
                    <th>Gambar</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kamar as $k) : ?>
                    <tr>
                        <td><?= $k->tipe_kamar ?></td>
                        <!-- <td><?= $k->gambar ?></td> -->

                        <td><img src="<?= base_url() . 'upload/kamar_akomodasi/' . $k->gambar; ?>" class="img-fluid img-thumbnail" alt="gambar1" width="100"></td>
                        <td><?= $k->jumlah ?></td>
                        <td>Rp. <?= number_format($k->harga)  ?></td>
                        <td>
                            <a href="<?= base_url('admin_ako/kamarakomodasi/detail/' . $k->id_kamar) ?>" class="btn btn-info">Detail</a>
                            <button class="btn btn-warning edit-btn" data-id="<?= $k->id_kamar; ?>" data-toggle="modal" data-target="#editModal">Edit</button>
                            <!-- Modal Edit Data -->
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Data Kamar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Tempat untuk menampilkan formulir edit data -->
                                            <div id="editFormContainer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <a href="<?= base_url('admin_ako/kamarakomodasi/edit/' . $k->id_kamar) ?>" class="btn btn-warning">Edit</a> -->
                            <a href="<?= base_url('admin_ako/kamarakomodasi/delete/' . $k->id_kamar) ?>" onclick="return confirm('Yakin ingin menghapus kamar ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>
</div>

<script>
    function loadFormTambahData() {
        $.ajax({
            url: '<?= base_url('admin_ako/kamarakomodasi/create/' . $id_akomodasi) ?>',
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

    function loadFormEditData(id) {
        $.ajax({
            url: '<?= base_url('admin_ako/kamarakomodasi/edit/') ?>' + id,
            method: 'GET',
            dataType: 'html',
            success: function(response) {
                $('#editFormContainer').html(response);
                $('#editModal').modal('show');
            },
            error: function() {
                alert('Gagal mengambil formulir!');
            }
        });
    }

    $(document).ready(function() {
        $('#tambahModalBtn').on('click', function() {
            loadFormTambahData();
        });

        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            loadFormEditData(id);
        });

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


<?php $this->load->view('template/footer') ?>

<!-- JS -->
<?php $this->load->view('template/js') ?>