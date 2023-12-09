<!-- application/views/search_view.php -->
<?php $this->load->view('landing/header') ?>


<link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
<!-- Navbar -->
<?php $this->load->view('landing/navbar') ?>
<!-- ... Your existing HTML code ... -->

<!-- Bagian HTML/PHP lainnya -->
<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- ... (bagian HTML lainnya) ... -->

                <!-- Form pencarian -->
                <form action="<?= base_url('search/search') ?>" class="search-property-1" method="get">
                    <!-- ... (bagian form lainnya) ... -->
                    <div class="col-lg d-flex">
                        <div class="form-group p-4 border-0">
                            <label for="#">Destination</label>
                            <div class="form-field">
                                <div class="icon"><span class="fa fa-search"></span></div>
                                <input type="search" class="form-control" placeholder="Search place" name="keyword">
                            </div>
                        </div>
                    </div>
                    <!-- ... (form lainnya) ... -->
                    <div class="col-lg d-flex">
                        <div class="form-group d-flex w-100 border-0">
                            <div class="form-field w-100 align-items-center d-flex">
                                <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary" name="submit">
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Menampilkan hasil pencarian -->
                <?php if ($results) : ?>
                    <div>
                        <h3>Search Results:</h3>
                        <ul>
                            <?php foreach ($results as $result) : ?>
                                <li><?= $result->nama ?></li> <!-- Gantilah 'nama' dengan kolom yang sesuai di tabel -->
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- ... (bagian HTML lainnya) ... -->
            </div>
        </div>
    </div>
</section>
<!-- ... (bagian HTML/PHP lainnya) ... -->

<!-- 

<div class="row">
    <?php if (!empty($results)) : ?>
        <?php foreach ($results as $result) : ?>
            <div class="col-md-4">
                <!-- Tampilkan hasil pencarian sesuai format yang diinginkan -->
<h3><?php echo $result->nama; ?></h3>
<p><?php echo $result->deskripsi; ?></p>
<p><?php echo $result->jenis; ?></p>
</div>
<?php endforeach; ?>
<?php else : ?>
    <div class="col-md-12">
        <p>No results found.</p>
    </div>
<?php endif; ?>
</div> -->

<!-- ... Your existing HTML code ... -->
<?php $this->load->view('landing/footer') ?>