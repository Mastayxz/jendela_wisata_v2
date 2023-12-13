// public/js/filter.js
$(document).ready(function() {
    $('#filter-button').on('click', function (event) {
        event.preventDefault();
        var kategori = [];
        $('input[name="kategori"]:checked').each(function() {
            kategori.push($(this).val());
        });
        var harga = $('#harga').val();
        var lokasi = [];
        $('input[name="lokasi"]:checked').each(function() {
            lokasi.push($(this).val());
        });
        // Kirim permintaan AJAX
        $.ajax({
            type: 'POST',
            url: 'HomeControl/filter', // Ganti dengan URL sesuai dengan rute di CodeIgniter
            data: {
                kategori: kategori,
                harga: harga,
                lokasi: lokasi
            },
            success: function(data) {
                // Perbarui elemen hasil-filter dengan hasil filter
                $('#hasil-filter').html(data);
            }
        });
    });
});

$(document).ready(function() {
    // Bind input event to text inputs
    $('#kategoriInput, #harga, #lokasiInput').on('input', function() {
        // Get values from text inputs
        var kategori = $('#kategoriInput').val();
        var harga = $('#harga').val();
        var lokasi = $('#lokasiInput').val();

        // Kirim permintaan AJAX
        $.ajax({
            type: 'POST',
            url: 'HomeControl/filter', // Ganti dengan URL sesuai dengan rute di CodeIgniter
            data: {
                kategori: kategori,
                harga: harga,
                lokasi: lokasi
            },
            success: function(data) {
                // Perbarui elemen hasil-filter dengan hasil filter
                $('#hasil-filter').html(data);
            }
        });
    });
});
