<?php $this->load->view('landing/header') ?>

<style>
    .sticky {
        position: -webkit-sticky;
        /* For Safari */
        position: sticky;
        top: 0;
        /* Adjust as necessary */
        z-index: 1000;
        /* Adjust as necessary to ensure it appears above other content */
        background-color: white;
        /* Ensure background is set to prevent content behind from showing through */
    }
</style>

<!-- Navbar -->
<link rel="stylesheet" href="<?php echo base_url('assets/template/backend/dist/css/userinfo.css') ?>" type="text/css">

<section class="hero-wrap hero-wrap-2" style="background-image: url('../assets/landing/images/bg_1.jpg');">
    <div class="container">
        <div class="container-xl px-4">
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-xl-12 h-100vh sticky"> <!-- Added sticky class here -->
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form>
                                <!-- Kembali button-->
                                <div class="mb-3">
                                    <a href="<?= base_url('user/event') ?>" class="btn btn-primary">Kembali</a>
                                </div>
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username</label>
                                    <input class="form-control" id="inputUsername" type="text" placeholder="" name="username" value="<?php echo $user['username'] ?>" readonly>
                                </div>
                                <!-- Form Group (name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFirstName">Name</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="" value="<?php echo $user['nama'] ?>" readonly>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="" value="<?php echo $user['email'] ?>" readonly>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Phone number</label>
                                        <input class="form-control" id="inputPhone" type="text" placeholder="" name="tlp_user" value="<?php echo $user['tlp_user'] ?>" readonly>
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Birthday</label>
                                        <input class="form-control" id="inputBirthday" type="date" name="birthday" placeholder="" name="tgl_lahir" value="<?php echo $user['tgl_lahir'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="<?= base_url('user/editinfo') ?>" class="btn btn-primary">Edit Info</a>
                                    <a href="<?= base_url('c_auth/logout') ?>" class="btn btn-primary">Logout</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('landing/footer') ?>