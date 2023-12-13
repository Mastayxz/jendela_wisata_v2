<!-- Meta -->
<?php $this->load->view('template/meta') ?>



<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>

<!-- Main Sidebar Container -->
<?php $admin_name = $this->session->userdata('admin_name'); ?>
<?php $this->load->view('template/sidebar', ['admin_name' => $admin_name]); ?>

<!-- Content Wrapper. Contains page content -->

<!--  -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 col-3">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $wisata; ?></h3>
                    <h2>Destinasi Wisata</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-home"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-3">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $akomodasi ?></h3>
                    <h2>Akomodasi</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-3">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo $member  ?></h3>
                    <h2>Member</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-3">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo $event ?></h3>
                    <h2>Event</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
</div>
<?php var_dump($this->session->userdata('admin_data')); ?>
<!-- /.content-wrapper -->


<!-- Footer -->
<?php $this->load->view('template/footer') ?>


<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('template/js') ?>