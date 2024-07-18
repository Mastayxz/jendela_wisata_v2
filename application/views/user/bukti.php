<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pembayaran</title>
</head>

<body>
    <h1>Bukti Pembayaran</h1>
    <p>ID Transaksi: <?php echo $transaksi['id']; ?></p>
    <p>ID User: <?php echo $transaksi['id_user']; ?></p>
    <p>Jumlah Pembayaran: <?php echo number_format($transaksi['amount'], 2); ?></p>
    <p>Status: <?php echo $transaksi['status'] == 2 ? 'Berhasil' : 'Gagal'; ?></p>
    <p>Waktu Pembayaran: <?php echo $transaksi['payment_time']; ?></p>
    <p>Referensi Pembayaran: <?php echo $transaksi['payment_reference']; ?></p>
</body>

</html>