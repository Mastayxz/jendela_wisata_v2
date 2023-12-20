<!-- Meta -->
<?php $this->load->view('landing/header') ?>


<link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
<!-- Navbar -->
<?php $this->load->view('landing/navbar') ?>


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/landing/images/bg_4.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user/tempat_wisata'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Hotel <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Destinastion</h1>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('landing/bar');
?>

<div class="container  ftco-animate">
    <form method="post" action="<?= base_url('user/filter/filterByJenisAkomodasi') ?>">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="filter_kategori" class="form-label mt-4">Jenis Akomodasi</label>
                    <select name="filter_kategori" id="filter_kategori" class="form-control">
                        <option value="">Semua</option>
                        <?php foreach ($kategori_list as $kategori) : ?>
                            <option value="<?= $kategori->id_kategori; ?>"><?= $kategori->nama_kategori; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="filter_kategori" class="form-label mt-4">Harga maksimum </label>
                    <input type="number" name="price" id="price" placeholder="Masukan Harga" class="form-control">
                </div>
            </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Filter</button> -->
    </form>
    <div class="row mt-5 ftco-animate" id="search_results">

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function performSearch() {
            var keyword = $('#table_search').val();
            $.ajax({
                url: "<?= base_url('user/search/search_tempat_wisata') ?>",
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

        function filterData() {
            var kategori_id = $('#filter_kategori').val();
            var price = $('#price').val();
            $.ajax({
                url: "<?= base_url('user/Filter/filterByCategory') ?>",
                type: "POST",
                data: {
                    filter_kategori: kategori_id,
                    price: price
                },
                success: function(data) {
                    $('#search_results').html(data);
                }
            });
        }

        // Event for processing changes in the category dropdown
        $('#filter_kategori').on('change', function() {
            filterData(); // Call filterData here
        });
    });
</script>
<!-- JS -->


<!-- JS -->
<!-- JS -->
<?php $this->load->view('landing/footer') ?>