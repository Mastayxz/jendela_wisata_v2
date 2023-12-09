<?php if (!empty($tempat_wisata)) : ?>

    <?php foreach ($tempat_wisata as $tw) : ?>
        <div class="col-md-4 ">
            <div class="project-wrap hotel">
                <a href="#" class="img">
                    <img src="<?= base_url() . '/upload/destinasi/' . $tw->gambar1; ?>" alt="" class="img">
                    <span class="price">Rp. <?= number_format($tw->biaya); ?> </span>
                </a>
                <div class="text p-4 mb-2">
                    <h3 class="mb-3"><a href="<?= base_url('user/tempat_wisata/detail/' . $tw->id_tempat_wisata); ?>"><?= $tw->nama; ?></a></h3>
                    <ul>
                        <div class="location"><span class="fa fa-map-marker"></span> <?= $tw->alamat; ?> </div>
                        <div class="location"><span class="fa fa-bars"></span> <?= $tw->kategori; ?> </div>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="9">Tidak ada hasil pencarian.</td>
    </tr>
<?php endif; ?>