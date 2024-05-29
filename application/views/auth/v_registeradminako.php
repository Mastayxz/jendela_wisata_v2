<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin</title>
</head>

<body>
    <h2>Form Registrasi Admin</h2>
    <form action="<?= base_url('c_authadminako/register'); ?>" method="post">
        <h3>Data Admin</h3>
        <label for="jenis_admin">Jenis Admin:</label><br>
        <select id="jenis_admin" name="jenis_admin" required>
            <option value="akomodasi">Akomodasi</option>
            <option value="event">Event</option>
            <option value="destinasi">Destinasi Wisata</option>
        </select><br><br>

        <div id="data_akomodasi" style="display:none;">
            <h3>Data Akomodasi</h3>
            <label for="nama_akomodasi">Nama Akomodasi:</label><br>
            <input type="text" id="nama_akomodasi" name="nama_akomodasi"><br>
            <!-- Other fields for akomodasi -->
        </div>

        <div id="data_event" style="display:none;">
            <h3>Data Event</h3>
            <label for="nama_event">Nama Event:</label><br>
            <input type="text" id="nama_event" name="nama_event"><br>
            <!-- Other fields for event -->
        </div>

        <div id="data_destinasi" style="display:none;">
            <h3>Data Destinasi Wisata</h3>
            <label for="nama_destinasi">Nama Destinasi:</label><br>
            <input type="text" id="nama_destinasi" name="nama_destinasi"><br>
            <!-- Other fields for destinasi wisata -->
        </div>

        <h3>Data Admin</h3>
        <label for="nama_ako">Nama Admin:</label><br>
        <input type="text" id="nama_ako" name="nama_ako" required><br>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Registrasi">
    </form>

    <script>
        document.getElementById('jenis_admin').addEventListener('change', function() {
            var akomodasi = document.getElementById('data_akomodasi');
            var event = document.getElementById('data_event');
            var destinasi = document.getElementById('data_destinasi');

            akomodasi.style.display = 'none';
            event.style.display = 'none';
            destinasi.style.display = 'none';

            if (this.value === 'akomodasi') {
                akomodasi.style.display = 'block';
            } else if (this.value === 'event') {
                event.style.display = 'block';
            } else if (this.value === 'destinasi') {
                destinasi.style.display = 'block';
            }
        });
    </script>
</body>

</html>