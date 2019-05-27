$(document).ready(function () {
    $(".ctl-add").click(function () {
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
    bindBtnsCart();
});

function bindBtnsCart() {
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
        if(confirm('¿Seguro que desea eliminar?')) {
            var route = $(this).data('del');
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
        }
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
        }else{
            $('.ctl-delivery-local').show('slow');
            $('.clt-delivery-home').hide();
            $('#delivery_price').text(' ');
        }
    });
};