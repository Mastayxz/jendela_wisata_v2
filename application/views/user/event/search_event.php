<?php if (!empty($event)) : ?>
    <?php foreach ($event as $ev) : ?>
        <div class="col-md-4">
            <div class="project-wrap hotel">
                <a href="<?= base_url('user/event/detail/' . $ev->id_event); ?>" class="img">
                    <img src="<?= base_url() . '/upload/event/' . $ev->gambar_event; ?>" class="img">
                    <span class="price">Rp. <?= number_format($ev->biaya_event); ?> </span>
                </a>
                <div class="text p-4 mb-2">
                    <h3><a href="<?= base_url('user/event/detail/' . $ev->id_event); ?>" class="mb-5"><?= $ev->nama_event; ?></a></h3>

                    <div class="location"><span class="fa fa-map-marker"></span> <?= $ev->alamat_event; ?> </div>

                    <ul>
                        <li><span class="fas fa-clock"></span><?= $ev->jam_buka; ?> - <?= $ev->jam_tutup; ?></li>
                        <li><span class="fas fa-calendar"></span> <?= date('F j, Y', strtotime($ev->tanggal_event)); ?></li>

                        <li><span class="flaticon-sun-umbrella"></span><?= $ev->nama_tempat_wisata; ?></li>
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