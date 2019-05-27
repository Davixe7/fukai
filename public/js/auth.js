$(document).ready(function () {
    $('#btnRegister').click(function () {
        var data = $('#registerForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#registerForm').data('url'),
            type: 'POST',
            data: data,
            success: function (data) {
                if (data.error) {
                    $('.errorsRegister').html('');
                    $.each(data['errors'], function (index, value) {
                        $('.errorsRegister').prepend('<li><span>' + value + '</span></li>');
                    });
                    $('.errorsRegister').show('slow');
                } else {
                    window.location.replace(data.datalocation);
                }
            }
        });
    });

    $('#btnLogin').click(function () {
        var data = $('#loginForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#loginForm').data('url'),
            type: 'POST',
            data: data,
            success: function (data) {
                if (data.error) {
                    $('.errorsLogin').html('');
                    $.each(data['errors'], function (index, value) {
                        $('.errorsLogin').prepend('<li><span>' + value + '</span></li>');
                    });
                    $('.errorsLogin').show('slow');
                } else {
                    if(data.location){
                        window.location.replace(data.location);
                    }else{
                        location.reload();
                    }
                    console.log(data.location);
                }
            }
        });
    });
    $('#btnRecover').click(function () {
        var data = $('#recoverForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#recoverForm').data('recover'),
            type: 'POST',
            data: data,
            success: function (data) {
                if (data.error) {
                    $('.errorsRecover').html('');
                    $.each(data['errors'], function (index, value) {
                        $('.errorsRecover').prepend('<li><span>' + value + '</span></li>');
                    });
                    $('.errorsRecover').show('slow');
                }else{
                    $('.errorsRecover').prepend('<li><span>Correo enviado correctamente</span></li>');
                    $('.errorsRecover').show('slow');
                }
            }
        });
    });
});
