<!-- application/views/admin/dashboard/event_ajax.php -->
<?php if (!empty($akomodasi)) : ?>
    <?php $no = 1; ?>
    <?php foreach ($akomodasi as $ak) : ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $ak->nama_akomodasi; ?></td>
            <td><?= $ak->nama_jenis_akomodasi; ?></td>
            <td>Rp. <?= number_format($ak->harga_akomodasi); ?> </td>
            <td><?= $ak->alamat_akomodasi; ?></td>

            <td>
                <div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; max-height:300px;">
                    <?= $ak->lokasi_akomodasi; ?>
                </div>
            </td>
            <td>
                <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; max-height:300px;">
                    <?= $ak->deskripsi_akomodasi; ?>
                </div>
            </td>
            <td><?= $ak->nama; ?></td>
            <td><img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi1; ?>" width="100" alt=""></td>
            <td><img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi2; ?>" width="100" alt=""></td>
            <td><img src="<?= base_url() . '/upload/akomodasi/' . $ak->gambar_akomodasi3; ?>" width="100" alt=""></td>

            <td>
                <a href="<?= base_url('admin/akomodasi/edit/' . $ak->id_akomodasi); ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
                <a href="<?= base_url('admin/akomodasi/delete/' . $ak->id_akomodasi); ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
            </td>

        </tr>


    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="9">Tidak ada hasil pencarian.</td>
    </tr>
<?php endif; ?>