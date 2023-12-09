$(document).ready(function() {
    function performSearch() {
        var keyword = $('#table_search').val();
        $.ajax({
            // Gunakan path lengkap untuk endpoint pencarian AJAX
            url: "user/event/search_ajax",
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