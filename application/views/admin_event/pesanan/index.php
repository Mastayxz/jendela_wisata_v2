<!-- Meta -->
<?php $this->load->view('template/meta', $page_title); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/nav.css') ?>"> -->
<!-- Navbar -->
<?php $this->load->view('templates/navbar'); ?>

<!-- Main Sidebar Container -->
<?php $this->load->view('templates/sidebar', $admin_data); ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pesanan</h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin_ako/pesanan/search'); ?>" method="post">
                    <input type="text" name="keyword" placeholder="Cari pesanan...">
                    <button type="submit">Cari</button>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Jumlah Orang</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $order) : ?>
                            <tr>
                                <td><?= $order['id_pemesanan']; ?></td>
                                <td><?= $order['nama']; // Menampilkan nama user 
                                    ?></td>
                                <td><?= $order['tanggal_pemesanan']; ?></td>
                                <td><?= $order['jumlah_orang']; ?></td>
                                <td>Rp. <?= number_format($order['total_harga']); ?></td>
                                <td>
                                    <?php if ($order['status'] == 0) : ?>
                                        <span class="badge badge-warning">Pending</span>
                                    <?php elseif ($order['status'] == 1) : ?>
                                        <span class="badge badge-success">Success</span>
                                    <?php elseif ($order['status'] == 2) : ?>
                                        <span class="badge badge-danger">Canceled</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-edit" data-id="<?= $order['id_pemesanan']; ?>" data-toggle="modal" data-target="#editModal">Edit</button>

                                    <a href="<?= base_url('admin_ako/pesanan/delete_pesanan_event/' . $order['id_pemesanan']) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data pesanan ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin_ako/pesanan/update'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Status Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pemesanan" id="id_pemesanan">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Pending</option>
                            <option value="1">Success</option>
                            <option value="2">Canceled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id_pemesanan = $(this).data('id');

            $.ajax({
                url: '<?= base_url('admin_ako/pesanan/edit/'); ?>' + id_pemesanan,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#id_pemesanan').val(data.id_pemesanan);
                    $('#status').val(data.status);
                }
            });
        });
    });
</script>