<body>
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/jenis_akomodasi/editjenis_akomodasi') ?>">
                    <div class="form-group">
                        <input type="hidden" name="id_jenis_akomodasi" value="<?= $jenis_akomodasi['id_jenis_akomodasi']; ?>">
                        <label for="" class="form-label">Nama Jenis Akomodasi</label>
                        <input type="text" name="jenis_akomodasi" id="" class="form-control" value="<?= $jenis_akomodasi['nama_jenis_akomodasi'] ?>">
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