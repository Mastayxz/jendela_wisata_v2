<!-- Meta -->
<?php $this->load->view('template/meta') ?>
<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>
<!-- Main Sidebar Container -->
<?php $this->load->view('template/sidebar'); ?>

<!-- Account page navigation -->

<hr class="mt-0 mb-4">
<div class="row">
    <div class="col-lg-12">
        <!-- Profile picture card -->


        <div class="card-body text-center">
            <!-- Profile picture image -->
            <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
            <!-- Profile picture help block -->
            <!-- <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div> -->
            <!-- Profile picture upload button -->
            <!-- <button class="btn btn-primary" type="button">Upload new image</button> -->
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12">
            <!-- Account details card -->
            <div class="card">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="" name="username" value="<?php echo $admin['username'] ?>">
                        </div>
                        <!-- Form Row -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (name) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="" value="<?php echo $admin['nama_admin'] ?>">
                            </div>
                        </div>
                        <!-- Form Group (email address) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="" value="<?php echo $admin['email'] ?>">
                        </div>
                        <!-- Logout button -->
                        <a href="<?= base_url('c_auth/logout') ?>" class="btn btn-primary">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>