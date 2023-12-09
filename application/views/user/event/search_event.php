<?php if (!empty($event)) : ?>
    <?php foreach ($event as $ev) : ?>
        <div class="col-md-4">


            <div class="project-wrap hotel">
                <a href="#" class="img">
                    <img src="<?= base_url() . '/upload/event/' . $ev->gambar_event; ?>" class="img">
                    <span class="price">Rp. <?= number_format($ev->biaya_event); ?> </span>
                </a>
                <div class="text p-4 mb-2">
                    <h3><a href="#" class="mb-5"><?= $ev->nama_event; ?></a></h3>

                    <div class="location"><span class="fa fa-map-marker"></span> <?= $ev->alamat_event; ?> </div>

                    <ul>
                        <li><span class="flaticon-shower"></span>2</li>
                        <li><span class="flaticon-king-size"></span>3</li>
                        <li><span class="flaticon-sun-umbrella"></span><?= $ev->nama; ?></li>
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