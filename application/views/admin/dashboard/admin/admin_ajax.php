<?php if (!empty($admin)) : ?>
    <?php $no = 1; ?>
    <?php foreach ($admin as $a) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $a->email; ?></td>
            <td><?= $a->username; ?></td>
            <td><?= $a->password; ?></td>
            <td><?= $a->nama_admin; ?></td>

            <td>
                <a href="<?= base_url('admin/admin/ubahadmin/' . $a->id_admin); ?>" class="btn btn-warning"><i class="fa fa-edit text-light"></i></a>
                <a href="<?= base_url('admin/admin/deleteadmin/' . $a->id_admin); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="9">Tidak ada hasil pencarian.</td>
    </tr>
<?php endif  ?>