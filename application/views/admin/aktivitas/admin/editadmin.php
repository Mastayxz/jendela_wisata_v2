<?php $this->load->view('template/meta') ?>
<div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('template/navbar') ?>

    <!-- Main Sidebar Container -->
    <?php $admin_name = $this->session->userdata('admin_name'); ?>
    <?php $this->load->view('template/sidebar', ['admin_name' => $admin_name]); ?>

    <body>
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">Edit Data Admin</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/editadmin') ?>">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Event</label>
                            <input type="text" name="id_admin" id="" value="<?php echo $admin['id_admin'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Biaya</label>
                            <input type="text" name="email" id="" value="<?php echo $admin['email'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Biaya</label>
                            <input type="text" name="username" id="" value="<?php echo $admin['username'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Jam Buka</label>
                            <input type="text" name="password" id="" value="<?php echo $admin['password'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Jam Tutup</label>
                            <input type="text" name="nama_admin" id="" value="<?php echo $admin['nama_admin'] ?>" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary my-4">Simpan</button>
                        <button type="reset" class="btn btn-danger my-4">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    /body> -->
    <?php $this->load->view('template/footer') ?>

</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('template/js') ?>


</html>