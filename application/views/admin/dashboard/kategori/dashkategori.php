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
                <a href="<?= base_url('admin/kategori/tambahkategori'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 330px; ">
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
                            <th>Nama Kategori</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <?php foreach ($kategori as $k) :
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?php echo $k->nama_kategori ?></td>

                                <td>
                                    <a href="<?php echo base_url('admin/kategori/ubahkategori/' . $k->id_kategori) ?>" class="btn btn-warning "><i class="fa fa-edit text-light"></i></a>
                                    <a href="<?php echo base_url('admin/kategori/deletekategori/' . $k->id_kategori) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>

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
<?php $this->load->view('template/footer') ?>
<!-- JS -->
<?php $this->load->view('template/js') ?>

<!-- content -->

</html>