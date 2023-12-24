<!-- Meta -->
<?php $this->load->view('landing/header') ?>


<link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
<!-- Navbar -->
<?php $this->load->view('landing/navbar') ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/services-1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user/tempat_wisata'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Event <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Event And Activity</h1>
            </div>
        </div>
    </div>
</section>



<!-- <?php $this->load->view('landing/bar') ?> -->


<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate">
                    <form method="post" action="<?= base_url('user/filter/filter_event') ?>" id="filterForm" class="search-property-1">
                        <div class="row no-gutters">
                            <div class="col-lg d-flex">
                                <div class="form-group p-4 border-0">
                                    <label for="#">Place Name</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-search"></span></div>
                                        <input type="text" name="alamat_event" id="alamat_event" class="form-control" placeholder="location name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Opening hours</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-clock"></span></div>
                                        <input type="time" name="jam_buka" id="jam_buka" class="form-control" placeholder="open">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Closing hours</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-clock"></span></div>
                                        <input type="time" name="jam_tutup" id="jam_tutup" class="form-control" placeholder="close">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Price</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <input type="text" name="price" id="price" placeholder="max price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="container ftco-animate">

    <div class="row mt-5" id="search_results">

    </div>
</div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function performSearch() {
            var keyword = $('#table_search').val();
            $.ajax({
                url: "<?= base_url('user/search/search_event') ?>",
                type: "POST",
                data: {
                    table_search: keyword
                },
                success: function(data) {
                    $('#search_results').html(data);
                }
            });
        }
        // Panggil performSearch saat halaman dimuat
        performSearch();

        // Event untuk memproses pencarian saat tombol pencarian diklik
        $('#search_button').on('click', function() {
            performSearch();
        });

        // Menangani submit form
        $('#search_form').on('submit', function(event) {
            event.preventDefault(); // Mencegah form untuk melakukan submit secara default
            performSearch();
        });


        $('#filterForm input').on('input', function() {
            // Mengumpulkan data dari setiap elemen formulir
            var alamat_event = $('#alamat_event').val();
            var jam_buka = $('#jam_buka').val();
            var jam_tutup = $('#jam_tutup').val();
            var price = $('#price').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('user/filter/filter_event') ?>',
                data: {
                    alamat_event: alamat_event,
                    jam_buka: jam_buka,
                    jam_tutup: jam_tutup,
                    price: price
                },
                success: function(data) {
                    $('#search_results').html(data);
                }
            });
        });
    });
</script>

<?php $this->load->view('landing/footer') ?>