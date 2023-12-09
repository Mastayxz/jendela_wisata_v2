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
    function performSearch() {
        var keyword = $('#table_search').val();
        $.ajax({
            url: "<?= base_url('user/event/search_ajax') ?>",
            type: "POST",
            data: {
                table_search: keyword
            },
            success: function(data) {
                $('#search_results').html(data);
            }
        });
    }

    // Panggil performSearch saat halaman dimuat
    performSearch();

    // Event untuk memproses pencarian saat tombol pencarian diklik
    $('#search_button').on('click', function() {
        performSearch();
    });

    // Menangani submit form
    $('#search_form').on('submit', function(event) {
        event.preventDefault(); // Mencegah form untuk melakukan submit secara default
        performSearch();
    });
});