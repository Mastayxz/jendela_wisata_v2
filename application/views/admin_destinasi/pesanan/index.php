<!-- Meta -->
<?php $this->load->view('template/meta', $page_title); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/nav.css') ?>"> -->
<!-- Navbar -->
<?php $this->load->view('templates/navbar'); ?>

<!-- Main Sidebar Container -->
<?php $this->load->view('templates/sidebar', $admin_data); ?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pesanan</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Jumlah Orang</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $order) : ?>
                            <tr>
                                <td><?= $order['id_pemesanan']; ?></td>
                                <td><?= $order['id_user']; ?></td>
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>