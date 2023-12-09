<?php if (!empty($tempat_wisata)) : ?>
    <?php $no = 1; ?>
    <?php foreach ($tempat_wisata as $tw) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $tw->nama; ?></td>
            <td>Rp. <?= number_format($tw->biaya); ?> </td>
            <td><?= $tw->alamat; ?></td>
            <td>
                <div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; max-height:300px;">
                    <?= $tw->lokasi; ?>
                </div>
            </td>
            <td><?= $tw->kategori; ?></td>
            <td class="d-flex">
                <div style="max-width: 100px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                    <?= $tw->deskripsi; ?>
                </div>
            </td>
            <td><img src="<?= base_url() . '/upload/destinasi/' . $tw->gambar1; ?>" width="100" height="100" alt=""></td>
            <td><img src="<?= base_url() . '/upload/destinasi/' . $tw->gambar2; ?>" width="100" height="100" alt=""></td>
            <td><img src="<?= base_url() . '/upload/destinasi/' . $tw->gambar3; ?>" width="100" height="100" alt=""></td>
            <td>
                <a href="<?= base_url('admin/tempatWisata/edit/' . $tw->id_tempat_wisata); ?>" class="btn btn-warning"><i class="fa fa-edit text-light"></i></a>
                <a href="<?= base_url('admin/tempatWisata/delete/' . $tw->id_tempat_wisata); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="9">Tidak ada hasil pencarian.</td>
    </tr>
<?php endif; ?>