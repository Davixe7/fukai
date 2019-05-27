/**
 * Created by Jorge Estay on 22/11/2016.
 */
$(document).ready(function () {
    bindSendOrder();
});
function bindSendOrder() {
    $('#btn-confirm').click(function () {
        var data = $('#confirmForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#confirmForm').data('url'),
            type: 'POST',
            data: data,
            success: function (data) {
                if (data.error) {
                    $('.errorsOrder').html('');
                    $.each(data['errors'], function (index, value) {
                        $('.errorsOrder').prepend('<li><span>' + value + '</span></li>');
                    });
                    $('.errorsOrder').show('slow');
                } else {
                    window.location.href = data.url;
                }
            }
        });
    });
}