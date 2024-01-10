<!-- Meta -->
<?php $this->load->view('template/meta') ?>



<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>

<!-- Main Sidebar Container -->
<?php $admin_name = $this->session->userdata('admin_name'); ?>
<?php $this->load->view('template/sidebar', ['admin_name' => $admin_name]); ?>

<!-- Content Wrapper. Contains page content -->

<!--  -->

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Welcome, <?= $nama_admin ?>!</h5>
                <p class="card-text">Here is the dashboard for Jendela Wisata.</p>
            </div>
        </div>
    </div>
</div>
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
                <a href="<?= base_url('admin/TempatWisata'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="<?= base_url('admin/akomodasi'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="<?= base_url('admin/user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="<?= base_url('admin/event'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
</div>

<!-- Login Logs -->
<!-- Dashboard content -->

<!-- Display welcome message and other dashboard elements -->

<!-- Display logged-in users -->


<!-- Remaining content of the view -->

<!-- <?php var_dump($this->session->userdata('admin_data')); ?> -->
<!-- /.content-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    // Check if the admin has logged in
    <?php if ($this->session->userdata('admin_data') && !$this->session->userdata('welcome_popup_shown')) : ?>
        // Display a welcome popup
        Swal.fire({
            title: 'Welcome, <?= $admin_name ?>!',
            text: 'Here is the dashboard for Jendela Wisata.',
            icon: 'success',
            confirmButtonText: 'OK'
        });

        // Set a session variable to indicate that the popup has been shown
        <?php $this->session->set_userdata('welcome_popup_shown', true); ?>
    <?php endif; ?>

    // Your existing script for other functionalities
</script>
<!-- Footer -->
<?php $this->load->view('template/footer') ?>


<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('template/js') ?>