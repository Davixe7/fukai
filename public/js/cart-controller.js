
$(document).ready(function () {
    $(".ctl-add").click(function () {
        var ts = $(this);
        ts.addClass('animated rubberBand');
        var dato = ts.data('add');
        $.ajax({
            url: dato,
            type: 'GET',
            success: function (request) {
                $('#ctl-cartcontent').html(request);
                $('#ctl-countcart').html($('#ctl-actualcount').html());
                setTimeout(function() {
                    ts.removeClass('animated rubberBand');
                }, 500);
                bindBtnsCart();
                bindModalShow();
            }
        });
    });
    bindBtnsCart();
});

// function restartClass() {
//     console.log('que sucede')
//     $('.ctl-add').removeClass('animated rubberBand');
// }

function bindBtnsCart() {
    //empty car
    $('.ctl-trash').click(function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        swal({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#560497',
            cancelButtonColor: '#240034',
            confirmButtonText: 'Si, vaciar',
            cancelButtonText: 'Cancelar'
        }).then(function () {
            window.location.href = link;
        })
    });
    // delete item cart ajax
    $(".ctl-del").click(function () {
        var route = $(this).data('del');
        $.ajax({
            url: route,
            type: 'GET',
            success: function (request) {
                $('#ctl-cartcontent').html(request);
                $('#ctl-countcart').html($('#ctl-actualcount').html());
                bindBtnsCart();
                bindModalShow();
            }

        });
    });
    $(".ctl-del-order").click(function () {
        var oThis = $(this);
        swal({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#560497',
            cancelButtonColor: '#240034',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then(function () {
            var route = oThis.data('del');
            $.ajax({
                url: route,
                type: 'GET',
                success: function (request) {
                    $('#ctl-products').html(request);
                    bindSendOrder();
                    addAddressOrder();
                    bindBtnsCart();
                }

            });
        })
    });
    $(".ctl-max").click(function () {
        var dato = $(this).data('add');
        $.ajax({
            url: dato,
            type: 'GET',
            success: function (request) {
                $('#ctl-cartcontent').html(request);
                $('#ctl-countcart').html($('#ctl-actualcount').html());
                bindBtnsCart();
                bindModalShow();
            }
        });
    });
    $(".ctl-max-order").click(function () {
        var dato = $(this).data('add');
        $.ajax({
            url: dato,
            type: 'GET',
            success: function (request) {
                $('#ctl-products').html(request);
                bindSendOrder();
                addAddressOrder();
                bindBtnsCart();
            }
        });
    });
    $(".ctl-min").click(function () {
        var dato = $(this).data('min');
        $.ajax({
            url: dato,
            type: 'GET',
            success: function (request) {
                $('#ctl-cartcontent').html(request);
                $('#ctl-countcart').html($('#ctl-actualcount').html());
                bindBtnsCart();
                bindModalShow();
            }
        });
    });
    $(".ctl-min-order").click(function () {
        var dato = $(this).data('min');
        $.ajax({
            url: dato,
            type: 'GET',
            success: function (request) {
                $('#ctl-products').html(request);
                bindSendOrder();
                addAddressOrder();
                bindBtnsCart();
            }
        });
    });

    $('input:radio[name="billing"]').change(function () {
        if($('input:radio[value="efectivo"]').is(':checked')){
            $('#cash').prop('disabled', false);
        }else{
            $('#cash').prop('disabled', true);
            $('#cash').val('');

        }
    });
    $('input:radio[name="deliveryplace"]').change(function () {
        if($('input:radio[value="Domicilio"]').is(':checked')){
            $('.ctl-delivery-local').hide('slow');
            $('.clt-delivery-home').show('slow');
            if ($("#ctl-add-address option:selected").data('price') !== undefined) {
                $('#delivery_price').text('*El despacho a domicilio tiene un costo de ' + $("#ctl-add-address option:selected").data('price') + ' este se vera reflejado en su orden de compra');
                $('#ctl-delivery-text').text('Valor Delivery');
                $('#ctl-delivery-price').text('$' + $("#ctl-add-address option:selected").data('price'));
                var total = parseInt($('#ctl-total-delivery').data('total')) + parseInt($("#ctl-add-address option:selected").data('price').replace('.', ''));
                $('#ctl-total-delivery').text('TOTAL: $' + $.number(total, 0,',', '.'));
                $('#ctl-total-delivery').css("border-top", "1px solid");
            }
            if ($("#ctl-towns option:selected").data('price') !== undefined) {
                $('#delivery_price').text('*El despacho a domicilio tiene un costo de ' + $("#ctl-towns option:selected").data('price') + ' este se vera reflejado en su orden de compra');
                $('#ctl-delivery-text').text('Valor Delivery');
                $('#ctl-delivery-price').text('$' + $("#ctl-add-address option:selected").data('price'));
                var total = parseInt($('#ctl-total-delivery').data('total')) + parseInt($("#ctl-towns option:selected").data('price').replace('.', ''));
                $('#ctl-total-delivery').text('TOTAL: $' + $.number(total, 0,',', '.'));
                $('#ctl-total-delivery').css("border-top", "1px solid");
            }
        }else{
            $('.ctl-delivery-local').show('slow');
            $('.clt-delivery-home').hide();
            $('#delivery_price').text(' ');
            $('#ctl-delivery-text').text(' ');
            $('#ctl-delivery-price').text(' ');
            $('#ctl-total-delivery').text(' ');
            $('#ctl-total-delivery').text(' ');
            $('#ctl-total-delivery').css("border-top", "");
        }
    });
};