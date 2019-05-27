$(document).ready(function () {
    
    // $('.banner').bxSlider({
    //     mode: 'horizontal',
    //     touchEnabled: true,
    //     captions: false,
    //     controls: false
    // });

    $('.outstanding').bxSlider({
        mode: 'fade',
        touchEnabled: true,
        captions: false,
        controls: false
    });
    $(".nano").nanoScroller();
    $(".nano-pane").css("display", "block");
    $(".nano-slider").css("display", "block");

    $(".custom-scrollbar").mCustomScrollbar({
        axis: "x" // horizontal scrollbar
    });

    $('.navmob').click(function () {
        $('.nav-top').toggle('slow');
    });

    $('.add-pdto').click(function () {
        $('.example-del').hide('slow');
        $('.example-add').show('slow');
    });

    $('.del-pdto').click(function () {
        $('.example-add').hide('slow');
        $('.example-del').show('slow');
    });


    $('.dialog-contact').click(function () {
        $('.shadow').show('slow');
    });
    
    bindModalShow();

    $('.register-btn').click(function () {
        $(document).find('body').css('overflow', 'hidden');
        $('.shadow').hide();
        $('.register').show('slow');
    });

    $('.recover-link').click(function () {
        $(document).find('body').css('overflow', 'hidden');
        $('.shadow').hide();
        $('.recover').show('slow');
    });

    // $('input[type="radio"]').checkboxradio();

    $('.rec').click(function () {
        $('.shadow').show('slow');
    });

    $('.cont').click(function () {
        $(document).find('body').css('overflow', 'hidden');
        $('.contact').show('slow');
    });

    $('.close').click(function () {
        $(document).find('body').css('overflow', 'auto');
        $('.shadow').hide('slow');
    });
    $('.dropdown-toggle').click(function () {
        $(this).next('.dropdown').toggle();
    });
    addAddressOrder();
    $('#ctl-flash').delay(3000).slideUp(300);

    datepicker();

    $(document).click(function(e) {
        if(!$(e.target).closest('.log').length && !$(e.target).closest('.dialog').length && !$(e.target).closest('.cont').length) {
            if($('.dialog').is(":visible")) {
                $(document).find('body').css('overflow', 'auto');
                $('.shadow').hide('slow');
            }
        }
    });
});
function addAddressOrder() {
    $('#cash').number(true, 0, ',', '.');
    $('#ctl-add-address').change(function () {
        if ($("#ctl-add-address option:selected").text() == 'Agregar') {
            window.location.href = $("#ctl-add-address option:selected").data('address');
            // $('#ctl-address').prop('disabled', false);
            // $('#ctl-towns').prop('disabled', false);
            // $('#ctl-new-address').show('fast');
            // $('#delivery_price').text(' ');
            // $('#ctl-delivery-price').text(' ');
            // $('#ctl-total-delivery').text(' ');
            // $('#ctl-total-delivery').css("border-top", "");
        } else {
            // $('#ctl-new-address').hide('fast');
            // $('#ctl-address').prop('disabled', true);
            // $('#ctl-towns').prop('disabled', true);
            $('#ctl-fulladdress').val($("#ctl-add-address option:selected").text());
            if ($("#ctl-add-address option:selected").data('price') !== undefined) {
                $('#delivery_price').text('*El despacho a domicilio tiene un costo de $' + $("#ctl-add-address option:selected").data('price') + ' este se verá reflejado en su orden de compra');

                $('#ctl-delivery-text').text('Valor Delivery');
                $('#ctl-delivery-price').text('$' + $("#ctl-add-address option:selected").data('price'));


                var total = parseInt($('#ctl-total-delivery').data('total')) + parseInt($("#ctl-add-address option:selected").data('price').replace('.', ''));
                
                $('#ctl-total-delivery').text('TOTAL: $' + $.number(total, 0, ',', '.'));
                $('#ctl-total-delivery').css("border-top", "1px solid");
            }
        }
    });


    $('#ctl-towns').change(function () {
        if ($("#ctl-towns option:selected").data('price') !== undefined) {
            $('#delivery_price').text('*El despacho a domicilio tiene un costo de $' + $("#ctl-towns option:selected").data('price') + ' este se verá reflejado en su orden de compra');
            $('#ctl-delivery-price').text('+ $' + $("#ctl-towns option:selected").data('price'));
            var total = parseInt($('#ctl-total-delivery').data('total')) + parseInt($("#ctl-towns option:selected").data('price').replace('.', ''));
            $('#ctl-total-delivery').text('TOTAL : $' + $.number(total, 0, ',', '.'));
            $('#ctl-total-delivery').css("border-top", "1px solid");
        }
    });

    $('#delivery_office_id').change(function () {
        $('#ctl-name-office').val($("#delivery_office_id option:selected").text());
    });
}

function bindModalShow() {
    $('.log').click(function () {
        $(document).find('body').css('overflow', 'hidden');
        if ($(this).data('locationurl')) {
            $('#datalocation').val($(this).data('locationurl'));
            $('.login').show('slow');
        } else {
            $('#datalocation').val('');
            $('.login').show('slow');
        }
    });
}


function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
function repeatOrder() {
    if ($('#ctl-countcart').text() > 0) {
        return confirm('Si repite el pedido, se eliminaran los productos que tenga ingresados en el carrito ¿Seguro que desea repetir?');
    }
}
function datepicker() {
    $.datepicker.setDefaults($.datepicker.regional["es"]);
    $.datepicker.setDefaults({
        firstDay: 1,
        dateFormat: "yy-mm-dd"
    });
    $("#birthdate").datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: "-100y",
        maxDate: new Date(),
        yearRange: "-100:+0"
    });
}
