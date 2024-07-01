<div class="container mt-5">
    <h2>Edit Kamar</h2>
    <form action="<?= base_url('admin_ako/kamarakomodasi/edit/' . $detail->id_kamar) ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tipe_kamar">Tipe Kamar:</label>
            <input type="text" class="form-control" name="tipe_kamar" id="tipe_kamar" value="<?= $detail->tipe_kamar ?>" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" class="form-control-file" name="gambar" id="gambar">
            <input type="hidden" name="existing_gambar" value="<?= $detail->gambar ?>">
            <small>Current Image: <?= $detail->gambar ?></small>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $detail->jumlah ?>" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" name="harga" id="harga" value="<?= $detail->harga ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>