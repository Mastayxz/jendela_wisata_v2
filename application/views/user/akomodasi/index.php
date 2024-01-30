<!-- Meta -->
<?php $this->load->view('landing/header') ?>

<!-- <link rel="stylesheet" href="<?php echo base_url('public/css/design.css'); ?>"> -->
<!-- Navbar -->
<?php $this->load->view('landing/navbar') ?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user/tempat_wisata'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hotel <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Accomodation</h1>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('landing/bar') ?>

<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate">
                    <form method="post" action="<?= base_url('user/filter/filter_akomodasi') ?>" id="filter-form" class="search-property-1">
                        <div class="row no-gutters">
                            <div class="col-lg d-flex">
                                <div class="form-group p-4 border-0">
                                    <label for="#">Location Name</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-map-marker"></span></div>
                                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="location name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Minim Price</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-tag"></span></div>
                                        <input type="text" name="filter_harga_min" id="filter_harga_min" class="form-control" placeholder="min price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Maxim Price</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-tag"></span></div>
                                        <input type="text" name="filter_harga_max" id="filter_harga_max" class="form-control" placeholder="max price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Destination Type</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="filter_jenis" id="filter_jenis" class="form-control">
                                                <option value="semua">semua</option>
                                                <?php foreach ($jenis_akomodasi_list as $ja) : ?>
                                                    <option value="<?= $ja->id_jenis_akomodasi; ?>"><?= $ja->nama_jenis_akomodasi; ?></option>
                                                <?php endforeach; ?>
                                            </select>
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


<div class="container  ftco-animate">
    <div class="row mt-5 ftco-animate" id="search_results">

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function performSearch() {
            var keyword = $('#table_search').val();

            $.ajax({
                url: "<?= base_url('user/search/search_akomodasi') ?>",
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
        // Menangani submit form
        $('#search_form').on('submit', function(event) {
            event.preventDefault(); // Mencegah form untuk melakukan submit secara default
            performSearch();
        });

        function filterData() {
            var alamat = $('#alamat').val();
            var id_jenis_akomodasi = $('#filter_jenis').val();
            var harga_min = $('#filter_harga_min').val();
            var harga_max = $('#filter_harga_max').val();

            $.ajax({
                url: "<?= base_url('user/filter/filter_akomodasi') ?>",
                type: "POST",
                data: {
                    alamat: alamat,
                    filter_jenis: id_jenis_akomodasi,
                    filter_harga_min: harga_min,
                    filter_harga_max: harga_max
                },
                success: function(data) {
                    $('#search_results').html(data);
                }
            });
        }

        // Event untuk memproses perubahan pada dropdown kategori
        $('#filter_jenis').on('change', function() {
            filterData();
        });

        // Event untuk memproses perubahan pada input harga
        $('#filter_harga_min, #filter_harga_max, #alamat').on('input', function() {
            filterData();
        });
    });
</script>

<!-- JS -->
<?php $this->load->view('landing/footer') ?>