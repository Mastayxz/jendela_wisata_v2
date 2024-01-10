<body>
    <div class="container-fluid">
        <div class="card card-primary">

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