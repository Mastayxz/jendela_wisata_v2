<nav class="main-header navbar navbar-expand navbar-white navbar-light " style="position: sticky;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('admin_ako/dashboard'); ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <button id="logoutButton" class="btn btn-danger">Logout</button>

        </li>
    </ul>
</nav>

<!-- SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Periksa apakah Bootstrap dan jQuery dimuat dengan benar -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Add a click event listener to the logout button
    document.getElementById('logoutButton').addEventListener('click', function() {
        Swal.fire({
            title: 'Logout',
            text: 'apakah anda yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms the logout, send an AJAX request to perform the logout
                $.ajax({
                    url: '<?= base_url('c_authadmin/logout') ?>',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Redirect to the desired page after successful logout
                            window.location.href = '<?= base_url('c_authadmin/index') ?>';
                        }
                    }
                });
            }
        });
    });
</script>