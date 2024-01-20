<body>
    <div class="container-fluid">
        <div class="card card-primary">
            <!-- <div class="card-header">Tambah Admin</div> -->
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/kategori/addkategori') ?>">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori"" id="" class=" form-control" required>
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