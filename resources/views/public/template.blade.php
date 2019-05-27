<!doctype html>
<html lang="es">
    <head>
        @include('public.inc.head')
    </head>
    <body>
        <div class="wrap">
            @include('public.inc.header')
                @yield('inc')
            
            @if (!Auth::check())
                @include('public.inc.modal_login')
                @include('public.inc.modal_recover')
                @include('public.inc.modal_register')
            @endif
            @include('public.inc.modal_contact')
            @include('public.inc.footer')
        </div>
    </body>
</html>