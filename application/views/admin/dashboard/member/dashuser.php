<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA USER</title>
</head>

<body>
    <h1>DATA USER</h1>
    <a href="user/tambahuser">Tambahkan Data</a>
    <table class="table table-dark" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Password</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($user->result_array() as $u) :
            ?>
                <tr>
                    <td><?php echo $u['id_user']; ?></td>
                    <td><?php echo $u['email'] ?></td>
                    <td><?php echo $u['password'] ?></td>
                    <td><?php echo $u['nama'] ?></td>
                    <td>
                        <a href="<?php echo base_url('user/deleteuser/' . $u['id_user']) ?>">Hapus</a>
                        <a href="<?php echo base_url('user/ubahuser/' . $u['id_user']) ?>">Ubah</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body> -->

<!-- Meta -->
<?php $this->load->view('template/meta') ?>
<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>
<!-- Main Sidebar Container -->
<?php $admin_name = $this->session->userdata('admin_name'); ?>
<?php $this->load->view('template/sidebar', ['admin_name' => $admin_name]); ?>

<div class="row">
    <div class="col-12">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
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
                            <th>Email</th>
                            <th>Username</th>
                            <!-- <th>Password</th> -->
                            <th>Nama</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <?php foreach ($user->result_array() as $u) : ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?php echo $u['email'] ?></td>
                                <td><?php echo $u['username'] ?></td>
                                <!-- <td><?php echo $u['password'] ?></td> -->
                                <td><?php echo $u['nama'] ?></td>

                                <td>

                                    <a href="<?= base_url('admin/user/deleteuser/' . $u['id_user']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>

                            </tr>

                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>

    </div>
</div>
<!-- Footer -->

<!-- JS -->
<?php $this->load->view('template/js') ?>

<!-- content -->

</html>