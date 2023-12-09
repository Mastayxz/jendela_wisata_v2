<body class="hold-transition sidebar-mini">
  <div class="wrapper">


    <?php $data['admin_name'] = $this->session->userdata('admin_name'); ?>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets/template/backend/dist') ?>/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Jendela Wisata</span>
      </a>

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/template/backend/dist') ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('c_authadmin/adminProfile'); ?>" class="d-block" style="color:white;"><?= $admin_name; ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/TempatWisata'); ?>" class="nav-link ">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Tempat Wisata</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/akomodasi'); ?>" class="nav-link">
                  <i class="fa fa-hotel nav-icon"></i>
                  <p>Akomodasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/kategori'); ?>" class="nav-link">
                  <i class="fa fa-leaf nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/jenis_akomodasi'); ?>" class="nav-link">
                  <i class="fa fa-bars nav-icon"></i>
                  <p>Jenis Akomodasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/event'); ?>" class="nav-link">
                  <i class="fa fa-gift nav-icon"></i>
                  <p>Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/admin'); ?>" class="nav-link">
                  <i class="fa fa-user-tie nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/User'); ?>" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Member</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Simple Link
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li> -->
        </ul>
      </nav>

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