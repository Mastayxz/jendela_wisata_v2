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
                <div class="card-header">Tambah Admin</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/admin/addadmin') ?>">
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" name="nama_admin" id="" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary my-4">Simpan</button>
                        <button type="reset" class="btn btn-danger my-4">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <!-- <body>
    <h1>TAMBAH DATA</h1>
    <table>
        <form action="<?php echo base_url('admin/admin/addadmin') ?>" method="post">
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" id=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="text" name="password" id=""></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama_admin" id=""></td>
            </tr>
            <tr>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </form>
    </table>
</body> -->
    <?php $this->load->view('template/footer') ?>

</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('template/js') ?>