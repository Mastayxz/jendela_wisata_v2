<!-- Meta -->
<?php $this->load->view('template/meta', $page_title); ?>
<!-- Navbar -->
<?php $this->load->view('templates/navbar'); ?>

<!-- Main Sidebar Container -->
<?php $this->load->view('templates/sidebar', $admin_data); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- <h2>Informasi Admin</h2> -->

            <?php if ($admin_data['akomodasi'] !== null) : ?>
                <h3>Informasi Admin Akomodasi</h3>
                <p>Selamat datang di halaman informasi admin akomodasi. Di sini, Anda dapat menemukan panduan dan informasi penting terkait pengelolaan akomodasi di Jendela Wisata.</p>
                <h4>1. Menambahkan Kamar Baru</h4>
                <ul>
                    <li>Masuk ke menu <strong>Rooms</strong> di sidebar.</li>
                    <li>Klik tombol <strong>Tambah Kamar</strong>.</li>
                    <li>Isi form dengan detail kamar, seperti nama kamar, deskripsi, fasilitas, harga, dan jumlah kamar yang tersedia.</li>
                    <li>Klik <strong>Simpan</strong> untuk menambahkan kamar baru.</li>
                </ul>

                <h4>2. Mengelola Pemesanan</h4>
                <ul>
                    <li>Masuk ke menu <strong>Pesanan</strong> di sidebar.</li>
                    <li>Anda dapat melihat daftar pemesanan yang masuk, termasuk detail seperti nama pemesan, tanggal check-in, jumlah kamar, dan total harga.</li>
                    <li>Anda dapat mengkonfirmasi pemesanan dengan mengubah status pemesanan menjadi <strong>Success</strong>.</li>
                </ul>

                <h4>3. Memperbarui Informasi Akomodasi</h4>
                <ul>
                    <li>Masuk ke menu <strong>Detail Akomodasi</strong> di sidebar.</li>
                    <li>Anda dapat mengedit informasi akomodasi, termasuk nama, deskripsi, alamat, dan kontak.</li>
                    <li>Klik <strong>Simpan</strong> untuk menyimpan perubahan.</li>
                </ul>
            <?php endif; ?>

            <?php if ($admin_data['event'] !== null) : ?>
                <h3>Informasi Admin Event</h3>
                <p>Selamat datang di halaman informasi admin event. Di sini, Anda dapat menemukan panduan dan informasi penting terkait pengelolaan event di Jendela Wisata.</p>
                <h4>1. Menambahkan Event Baru</h4>
                <ul>
                    <li>Masuk ke menu <strong>Event</strong> di sidebar.</li>
                    <li>Klik tombol <strong>Tambah Event</strong>.</li>
                    <li>Isi form dengan detail event, seperti nama event, deskripsi, tanggal, lokasi, dan harga tiket.</li>
                    <li>Klik <strong>Simpan</strong> untuk menambahkan event baru.</li>
                </ul>

                <h4>2. Mengelola Pemesanan Tiket</h4>
                <ul>
                    <li>Masuk ke menu <strong>Pesanan</strong> di sidebar.</li>
                    <li>Anda dapat melihat daftar pemesanan tiket yang masuk, termasuk detail seperti nama pemesan, jumlah tiket, tanggal event, dan total harga.</li>
                    <li>Anda dapat mengkonfirmasi pemesanan dengan mengubah status pemesanan menjadi <strong>Success</strong>.</li>
                </ul>

                <h4>3. Memperbarui Informasi Event</h4>
                <ul>
                    <li>Masuk ke menu <strong>Detail Event</strong> di sidebar.</li>
                    <li>Anda dapat mengedit informasi event, termasuk nama, deskripsi, tanggal, lokasi, dan harga tiket.</li>
                    <li>Klik <strong>Simpan</strong> untuk menyimpan perubahan.</li>
                </ul>
            <?php endif; ?>

            <?php if ($admin_data['tempat_wisata'] !== null) : ?>
                <h3>Informasi Admin Destinasi</h3>
                <p>Selamat datang di halaman informasi admin destinasi. Di sini, Anda dapat menemukan panduan dan informasi penting terkait pengelolaan destinasi wisata di Jendela Wisata.</p>
                <h4>1. Menambahkan Destinasi Baru</h4>
                <ul>
                    <li>Masuk ke menu <strong>Destinasi</strong> di sidebar.</li>
                    <li>Klik tombol <strong>Tambah Destinasi</strong>.</li>
                    <li>Isi form dengan detail destinasi, seperti nama destinasi, deskripsi, lokasi, dan harga tiket masuk.</li>
                    <li>Klik <strong>Simpan</strong> untuk menambahkan destinasi baru.</li>
                </ul>

                <h4>2. Mengelola Pemesanan Tiket</h4>
                <ul>
                    <li>Masuk ke menu <strong>Pesanan</strong> di sidebar.</li>
                    <li>Anda dapat melihat daftar pemesanan tiket yang masuk, termasuk detail seperti nama pemesan, jumlah tiket, tanggal kunjungan, dan total harga.</li>
                    <li>Anda dapat mengkonfirmasi pemesanan dengan mengubah status pemesanan menjadi <strong>Success</strong>.</li>
                </ul>

                <h4>3. Memperbarui Informasi Destinasi</h4>
                <ul>
                    <li>Masuk ke menu <strong>Detail Destinasi</strong> di sidebar.</li>
                    <li>Anda dapat mengedit informasi destinasi, termasuk nama, deskripsi, lokasi, dan harga tiket masuk.</li>
                    <li>Klik <strong>Simpan</strong> untuk menyimpan perubahan.</li>
                </ul>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php $this->load->view('templates/footer', $admin_data); ?>