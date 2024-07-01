<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            padding-top: 20px;
            /* Margin atas untuk memberikan ruang dari atas */
        }

        .invoice-container {
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            padding: 20px;
            max-width: 800px;
            margin: auto;
            /* Memusatkan container di tengah halaman */
        }

        .button-wrapper {
            text-align: center;
            margin-top: 20px;
            /* Jarak antara invoice dan tombol */
        }
    </style>
</head>

<body>
    <div class="container invoice-container mt-5">
        <h2 class="mb-4">Invoice</h2>
        <div class="row">
            <div class="col">
                <p><strong>Nama:</strong> <?= $user['nama'] ?></p>
                <p><strong>Email:</strong> <?= $user['email'] ?></p>
                <p><strong>Tanggal Pemesanan:</strong> <?= $pemesanan['tanggal_pemesanan'] ?></p>
                <p><strong>Jumlah Orang:</strong> <?= $pemesanan['jumlah_orang'] ?></p>
                <p><strong>Total Harga:</strong> Rp<?= number_format($pemesanan['total_harga'], 0, ',', '.') ?></p>

                <!-- Tambahkan detail spesifik berdasarkan jenis pesanan -->
                <?php if ($jenis_pesanan == 'destinasi') : ?>
                    <p><strong>Destinasi:</strong> <?= $destinasi['nama_tempat_wisata'] ?></p>
                <?php elseif ($jenis_pesanan == 'akomodasi') : ?>
                    <p><strong>Akomodasi:</strong> <?= $akomodasi['nama_akomodasi'] ?></p>
                <?php elseif ($jenis_pesanan == 'event') : ?>
                    <p><strong>Event:</strong> <?= $event['nama_event'] ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container button-wrapper">
        <button class="btn btn-primary" onclick="downloadInvoice()">Download Invoice as PNG</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        function downloadInvoice() {
            html2canvas(document.querySelector('.invoice-container'), {
                onrendered: function(canvas) {
                    var link = document.createElement('a');
                    link.href = canvas.toDataURL("image/png");
                    link.download = 'invoice.png';
                    link.click();
                }
            });
        }
    </script>
</body>

</html>