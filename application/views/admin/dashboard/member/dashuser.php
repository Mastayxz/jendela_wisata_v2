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
                <div class="card-tools">
                    <?php echo form_open('admin/user/searchUser'); ?>
                    <div class="input-group input-group-sm" style="width: 200px; height:40px;">

                        <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Search" style="width: 200px; height:40px;">
                        <div class=" input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>

                        </div>
                    </div>
                    <?php echo form_close(); ?>
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
                            <th>No telpon</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <?php foreach ($user as $u) : ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?php echo $u->email ?></td>
                                <td><?php echo $u->username ?></td>
                                <!-- <td><?php echo $u->password ?></td> -->
                                <td><?php echo $u->nama ?></td>
                                <td><?= $u->tlp_user; ?></td>
                                <td><?= $u->tgl_lahir; ?></td>
                                <td>

                                    <a href="<?= base_url('admin/user/deleteuser/' . $u->id_user); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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