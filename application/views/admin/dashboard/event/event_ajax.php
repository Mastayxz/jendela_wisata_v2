<!-- application/views/admin/dashboard/event_ajax.php -->
<?php if (!empty($event)) : ?>
    <?php $no = 1; ?>
    <?php foreach ($event as $ev) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $ev->nama_event; ?></td>
            <td>Rp. <?= number_format($ev->biaya_event); ?> </td>
            <td><?= $ev->alamat_event; ?></td>
            <td><?= $ev->nama ?? ''; ?></td>
            <td><?= $ev->jam_buka; ?></td>
            <td><?= $ev->jam_tutup; ?></td>
            <td><img src="<?= base_url('upload/event/' . $ev->gambar_event); ?>" width="100" alt=""></td>
            <td>
                <a href="<?= base_url('admin/event/edit/' . $ev->id_event); ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
                <a href="<?= base_url('admin/event/delete/' . $ev->id_event); ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="9">Tidak ada hasil pencarian.</td>
    </tr>
<?php endif; ?>