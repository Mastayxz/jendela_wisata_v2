<link rel="stylesheet" href="<?php echo base_url('assets/template/backend/dist/css/userinfo.css') ?>" type="text/css">


<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="userinfo" target="__blank">Profile</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-12 h-100vh ">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="" name="username" value="<?= $this->session->userdata('username') ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (name)-->
                            
                                <label class="small mb-1" for="inputFirstName">Name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="" value="<?= $this->session->userdata('nama') ?>">
                        </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="" value="<?= $this->session->userdata('email') ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="" name="tlp" value="<?= $this->session->userdata('tlp_user') ?>">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="" name="tgllahir" value="<?= $this->session->userdata('tgl_lahir') ?>">
                            </div>
                        </div>
                        <!-- Logout button-->
                        <a href="<?= base_url('c_auth/logout') ?>" class="btn btn-primary">logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>