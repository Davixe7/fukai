<title>FUKAI - Sushi Delivery</title>
<meta charset="UTF-8"/>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
<meta name="viewport" content="width=device-width">
<meta name="mobile-web-app-capable" content="yes">

<!-- FAVICON -->
<link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicon/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('img/favicon/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('img/favicon/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('css/nanoscroller.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/mCustomScrollbar.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css" />

{{--js--}}
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('js/jquery.bxslider.js') }}"></script>
<script src="{{ asset('js/wheelzoom.js') }}"></script>
<script src="{{ asset('js/jquery.number.min.js') }}"></script>
<script src="{{ asset('js/general.js') }}"></script>
<script src="{{ asset('js/cart-controller.js') }}"></script>
<script src="{{ asset('js/user-controller.js') }}"></script>
<script src="{{ asset('js/order-controller.js') }}"></script>
<script src="{{ asset('js/contact.js') }}"></script>
<script src="{{ asset('js/nanoscroller.min.js') }}"></script>
<script src="{{ asset('js/mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datepicker-es.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-99382981-1', 'auto');
    ga('send', 'pageview');

</script>
<script>function loadScript(a) {
        var
            b = document.getElementsByTagName("head")[0], c = document.createElement("script");
        c.type = "text/javascript", c.src = "https://tracker.metricool.com/resources/be.js", c.onreadystatechange = a, c.onload = a, b.appendChild(c)
    }
    loadScript(function () {
        beTracker.t({hash: "1b4458d088cfe64e02e63a421882c277"})
    });</script>
@if(!Auth::check())
    <script src="{{ asset('js/auth.js') }}"></script>
@endif