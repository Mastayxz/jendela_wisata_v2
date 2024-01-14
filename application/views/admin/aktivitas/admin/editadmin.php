<body>
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">Edit Data Admin</div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/admin/editadmin') ?>">
                    <div class="form-group">

                        <input type="hidden" name="id_admin" id="" value="<?php echo $admin['id_admin'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" id="" value="<?php echo $admin['email'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" id="" value="<?php echo $admin['username'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Password</label>
                        <input type="text" name="password" id="" value="<?php echo $admin['password'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nama Admin</label>
                        <input type="text" name="nama_admin" id="" value="<?php echo $admin['nama_admin'] ?>" class="form-control">
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-power-off"></i> Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>




</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('template/js') ?>


</html>