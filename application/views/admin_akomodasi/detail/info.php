<!-- Meta -->
<?php $this->load->view('template/meta', $page_title); ?>
<!-- Navbar -->
<?php $this->load->view('templates/navbar'); ?>

<!-- Main Sidebar Container -->
<?php $this->load->view('templates/sidebar', $admin_data); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Informasi Admin Akomodasi</h2>
            <p>Selamat datang di halaman informasi admin akomodasi. Di sini, Anda dapat menemukan panduan dan informasi penting terkait pengelolaan akomodasi di Jendela Wisata.</p>

            <h4>Panduan Menginput Data</h4>
            <p>Berikut adalah langkah-langkah untuk menginput data akomodasi:</p>
            <ol>
                <li>Masuk ke dashboard admin.</li>
                <li>Klik menu "Detail Akomodasi".</li>
                <li>Isi informasi akomodasi seperti nama, alamat, fasilitas, dll.</li>
                <li>Untuk menambahkan kamar, klik menu "Rooms" dan isi detail kamar seperti jenis kamar, harga, dan fasilitas.</li>
                <li>Pastikan semua informasi sudah benar sebelum disimpan.</li>
            </ol>

            <h4>Tips dan Trik</h4>
            <p>Untuk memastikan akomodasi Anda menarik bagi wisatawan, perhatikan hal-hal berikut:</p>
            <ul>
                <li>Tambahkan foto berkualitas tinggi dari akomodasi dan fasilitas yang disediakan.</li>
                <li>Tulis deskripsi yang menarik dan informatif.</li>
                <li>Update harga dan ketersediaan kamar secara berkala.</li>
                <li>Berikan penawaran atau diskon khusus untuk menarik lebih banyak wisatawan.</li>
            </ul>

            <h4>Bantuan dan Dukungan</h4>
            <p>Jika Anda memerlukan bantuan lebih lanjut, silakan hubungi tim dukungan kami melalui email di support@jendelawisata.com atau melalui telepon di (021) 123-4567.</p>
        </div>
    </div>
</div>