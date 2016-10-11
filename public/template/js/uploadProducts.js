$(document).ready(function () {
    var progress = false;
    var startFrom = 5;
    $('#btn-more').click(function () {
        $.ajax({
            url: '/admin/upload',
            type: 'GET',
            data: {startFrom: startFrom},
            beforeSend: function () {
                progress = true;
            },
            success: function (data) {
                $('#table-products-ajax').append(data);
                progress = false;
                startFrom += 5;
            }
        });
    });
});
