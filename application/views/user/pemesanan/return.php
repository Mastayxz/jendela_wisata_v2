<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <!-- Include CSS atau styling lainnya sesuai kebutuhan -->
</head>

<body>
    <div class="container">
        <h1>Payment Success!</h1>
        <p>Thank you for your payment. Here are the details:</p>

        <ul>
            <li>ID Pesanan: <?php echo $pemesanan['id']; ?></li>
            <li>Jenis Pesanan: <?php echo $jenis_pesanan; ?></li>
            <!-- Tambahkan detail lainnya sesuai kebutuhan -->
        </ul>

        <p>Terima kasih telah melakukan pembayaran. Silakan cek email Anda untuk informasi lebih lanjut.</p>
    </div>
</body>

</html>