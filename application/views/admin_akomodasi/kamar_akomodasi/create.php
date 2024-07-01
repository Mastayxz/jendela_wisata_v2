<div class="container mt-5">
    <h2>Tambah Kamar</h2>
    <form action="<?= base_url('admin_ako/kamarakomodasi/create/' . $id_akomodasi) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_akomodasi" value="<?= $id_akomodasi ?>">

        <div class="form-group">
            <label for="tipe_kamar">Tipe Kamar:</label>
            <input type="text" class="form-control" name="tipe_kamar" id="tipe_kamar" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" class="form-control-file" name="gambar" id="gambar" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" name="harga" id="harga" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>