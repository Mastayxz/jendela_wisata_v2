<!-- Meta -->
<?php $this->load->view('template/meta') ?>
<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>
<!-- Main Sidebar Container -->
<?php $this->load->view('template/sidebar'); ?>

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
                            <th>Kode Pemesanan</th>
                            <th>Nama</th>
                            <th>Tanggal Pemesanan</th>
                            <!-- <th>Jumlah Orang</th> -->
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $order) : ?>
                            <tr>
                                <td><?= $order['id']; ?></td>
                                <td><?= $order['id_pemesanan_event']; ?></td>
                                <td><?= $order['nama']; // Menampilkan nama user 
                                    ?></td>

                                <td><?= $order['created_at']; ?></td>
                                <!-- <td><?= $order['status']; ?></td> -->
                                <td>Rp. <?= number_format($order['amount']); ?></td>
                                <td>
                                    <?php if ($order['status'] == 1) : ?>
                                        <span class="badge badge-warning">Pending</span>
                                    <?php elseif ($order['status'] == 0) : ?>
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