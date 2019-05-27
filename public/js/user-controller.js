$(document).ready(function () {
    $('#btnSaveInfo').click(function (e) {
        e.preventDefault();
        var data = $('#infoForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#infoForm').data('url'),
            type: 'POST',
            data: data,
            success: function (data) {
                if (data.error) {
                    $('.errorsInfo').html('');
                    $.each(data['errors'], function (index, value) {
                        $('.errorsInfo').prepend('<li><span>' + value + '</span></li>');
                    });
                    $('.errorsInfo').show('slow');
                } else {
                    $('#ctl-username').html($('#ctl-newusername').val().split(' ')[0]);
                    $('.errorsInfo').html('');
                    $('.errorsInfo').prepend('<li><span>Guardado correctamente</span></li>');
                    $('.errorsInfo').show('slow');
                    setTimeout(hideMessage, 5000);
                }
            }
        });
    });

    $('#btnChangePass').click(function (e) {
        e.preventDefault();
        var data = $('#changePassForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#changePassForm').data('url'),
            type: 'POST',
            data: data,
            success: function (data) {
                if (data.error) {
                    $('.errorsChangePass').html('');
                    $.each(data['errors'], function (index, value) {
                        $('.errorsChangePass').prepend('<li><span>' + value + '</span></li>');
                    });
                    $('.errorsChangePass').show('slow');
                } else {
                    $('#ctl-username').html($('#ctl-newusername').val());
                    $('.errorsChangePass').html('');
                    $('#changePassForm').each(function () {
                        this.reset();
                    });
                    $('.errorsChangePass').prepend('<li><span>Guardado correctamente</span></li>');
                    $('.errorsChangePass').show('slow');
                    setTimeout(hideMessage, 5000);
                }
            }
        });
    });

    BindButtonsAddress();
});
function BindButtonsAddress() {
    $('#btnCreateAddress').click(function () {
        var data = $('#AddressForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#AddressForm').data('url'),
            type: 'POST',
            data: data,
            success: function (data) {
                if (data.error) {
                    $('.errorsAddress').html('');
                    $.each(data['errors'], function (index, value) {
                        $('.errorsAddress').prepend('<li><span>' + value + '</span></li>');
                    });
                } else {
                    $('#address').html(data);
                    BindButtonsAddress();
                }
            }
        });
    });

    $('.ctl-delete-address').click(function (e) {
        e.preventDefault();
        var oThis = $(this);
        swal({
            title: '¿Deseas eliminar esta dirección?',
            text: "¡no podrás revertir esta acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#560497',
            cancelButtonColor: '#240034',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then(function () {
            console.log(oThis.data('url'));
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: oThis.data('url'),
                type: 'GET',
                success: function (data) {
                    if (data.error) {
                        $('.errorsAddress').html('');
                        $.each(data['errors'], function (index, value) {
                            $('.errorsAddress').prepend('<li><span>' + value + '</span></li>');
                        });
                    } else {
                        $('#addresses').html(data);
                        BindButtonsAddress();
                    }
                }
            });
        });
    });
}
function hideMessage() {
    $('.errorsInfo').hide('slow');
    $('.errorsChangePass').hide('slow');
    $('.errorsDialog').html('');
}