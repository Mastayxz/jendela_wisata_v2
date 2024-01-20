<?php if (!empty($akomodasi)) : ?>
    <?php foreach ($akomodasi as $ak) : ?>
        <div class="col-md-4 ">

            <div class="project-wrap hotel">
                <a href="<?= base_url('user/akomodasi/detail/' . $ak->id_akomodasi); ?>" class="img">
                    <img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi1; ?>" class="img">
                    <span class="price">Rp. <?= number_format($ak->harga_akomodasi); ?> </span>
                </a>
                <div class="text p-4 mb-2">
                    <h3><a href="<?= base_url('user/akomodasi/detail/' . $ak->id_akomodasi); ?>" class="mb-5"><?= $ak->nama_akomodasi; ?></a></h3>

                    <div class="location"><span class="fa fa-map-marker"></span> <?= $ak->alamat_akomodasi; ?> </div>
                    <div class="location"><span class="flaction-hotel"></span> <?= $ak->nama_jenis_akomodasi; ?> </div>
                    <ul>
                        <li><span class="flaticon-shower"></span></li>
                        <li><span class="flaticon-king-size"></span></li>
                        <li><span class="flaticon-sun-umbrella"></span><?= $ak->nama_tempat_wisata; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td>tidak ada pencarian</td>
    </tr>
<?php endif ?>