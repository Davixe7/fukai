/**
 * Created by Jorge Estay on 28/10/2016.
 */
//------------- from contacto --------------------
$(document).ready(function () {
    $('#btnContact').click(function() {
        var data = $('#contactForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#contactForm').data('url'),
            type: 'POST',
            data: data,
            success: function(data) {
                if (data.error) {
                    $('.errorsContact').html('');
                    $.each(data['errors'], function(index, value) {
                        $('.errorsContact').prepend('<li><span>' + value + '</span></li>');
                    });
                    $('.errorsContact').show('slow');
                }else{
                    $('.errorsContact').html('');
                    $('.errorsContact').prepend('<li><span>' + data.msg + '</span></li>');
                    $('#contactForm').each(function() {
                        this.reset();
                    });
                }
            }
        });

    });
});