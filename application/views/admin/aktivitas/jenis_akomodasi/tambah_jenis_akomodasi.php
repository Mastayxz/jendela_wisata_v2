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
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/jenis_akomodasi/addjenis_akomodasi') ?>">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Jenis Akomodasi</label>
                            <input type="text" name="jenis_akomodasi" id="" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary my-4">Simpan</button>
                        <button type="reset" class="btn btn-danger my-4">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <?php $this->load->view('template/footer') ?>

</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('template/js') ?>