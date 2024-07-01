<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- <?php $admin_name = $this->session->userdata('admin_name'); ?> -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?= base_url('homecontrol/index'); ?>" class="brand-link">
                <img src="<?php echo base_url('assets/template/backend/dist') ?>/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bold">Jendela Wisata</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="<?php echo base_url('assets/template/backend/dist') ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                    </div>
                    <div class="info">
                        <a href="<?= base_url('admin/admininfo'); ?>" class="d-block " style="color:white;"><?= $admin_name; ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <!-- sidebar.php -->

                    <ul class="nav nav-pills nav-sidebar flex-column text-light" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item <?php echo ($this->uri->segment(2) == 'dashboard') ? 'menu-open' : ''; ?>">
                            <a href="<?= base_url('admin_ako/dashboard'); ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'dashboard') ? 'active' : ''; ?>">
                                <i class=" fas fa-tachometer-alt nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <?php if ($admin_data['akomodasi'] !== null) : ?>
                            <!-- Jika yang login adalah akomodasi -->
                            <li class="nav-item <?php echo ($this->uri->segment(2) == 'detail') ? 'menu-open' : ''; ?>">
                                <a href="<?= base_url('admin_ako/detail/index/') . $admin_data['akomodasi']; ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'detail') ? 'active' : ''; ?>">
                                    <i class="fa fa-info nav-icon"></i>
                                    <p>Detail Akomodasi</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($admin_data['event'] !== null) : ?>
                            <!-- Jika yang login adalah event -->
                            <li class="nav-item <?php echo ($this->uri->segment(2) == 'detail_event') ? 'menu-open' : ''; ?>">
                                <a href="<?= base_url('admin_ako/detail_event/index/') . $admin_data['event']; ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'detail_event') ? 'active' : ''; ?>">
                                    <i class="fa fa-info nav-icon"></i>
                                    <p>Detail Event</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($admin_data['tempat_wisata'] !== null) : ?>
                            <!-- Jika yang login adalah event -->
                            <li class="nav-item <?php echo ($this->uri->segment(2) == 'detail_destinasi') ? 'menu-open' : ''; ?>">
                                <a href="<?= base_url('admin_ako/detail_destinasi/index/') . $admin_data['tempat_wisata']; ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'detail_event') ? 'active' : ''; ?>">
                                    <i class="fa fa-info nav-icon"></i>
                                    <p>Detail Destinasi</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($admin_data['akomodasi'] !== null) : ?>
                            <li class="nav-item <?php echo ($this->uri->segment(2) == 'room') ? 'menu-open' : ''; ?>">
                                <a href="<?= base_url('admin_ako/KamarAkomodasi/index/') . $admin_data['akomodasi']; ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'room') ? 'active' : ''; ?>">
                                    <i class="fa fa-money-check nav-icon"></i>
                                    <p>Rooms</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!-- Tambahkan elemen lainnya sesuai kebutuhan -->
                        <li class="nav-item <?php echo ($this->uri->segment(2) == 'pesanan') ? 'menu-open' : ''; ?>">
                            <a href="<?= base_url('admin_ako/pesanan'); ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'pesanan') ? 'active' : ''; ?>">
                                <i class="fa fa-shopping-cart nav-icon"></i>
                                <p>Pesanan</p>
                            </a>
                        </li>
                        <!-- (Kode lainnya, jika ada) -->
                    </ul>

                </nav>
            </div>
    </div>

    </aside>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $page_title; ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><?= $page_title; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">