<!doctype html>
<html lang="es">
<head>
    @include('public.inc.head')
</head>
<body>
<div class="wrap">
    <header>
        <nav>
            <a href="{{ route('index') }}" class="logo"></a>
            <a href="#" class="navmob"><span></span><span></span><span></span></a>
            <ul class="nav-top">
                <li><a class="" href="{{ route('index') }}">INICIO</a></li>
                <!-- <li><a href="us/index.html">NOSOTROS</a></li> -->
                <li><a class="" href="{{ route('nosotros') }}">NOSOTROS</a></li>
                <li><a class="" href="{{ route('restaurant') }}">RESTAURANTES</a></li>
                <!-- <li><a href="#">RESERVAS</a></li> -->
                {{--<li><a class="cont" href="#">CONTACTO</a></li>--}}
                @if(Auth::check())
                    <li class="dropdown">
                        <a id="username" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <span id="ctl-username">{{ explode(' ', Auth::user()->name)[0] }}</span>&nbsp;<i class="user-ico"></i><span
                                    class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('user.perfil') }}">Mi perfil</a></li>
                            <li><a href="{{ route('my.purchases') }}">Mis Compras</a></li>
                            <li><a href="{{route('logout')}}">Finalizar Sesión</a></li>
                        </ul>
                    </li>
                @else
                    <li><a class="log" href="#">INGRESAR</a></li>
                @endif
            </ul>
            @if(Auth::check())
                <a href="{{ route('purchase.order') }}" class="top-shart">
                    <span id="ctl-countcart">{{ Cart::count() }}</span>
                </a>
            @else
                <a href="#" class="top-shart log">
                    <span id="ctl-countcart">{{ Cart::count() }}</span>
                </a>
            @endif
        </nav>
    </header>
    <div class="box">
        <div class="" style="text-align: center; margin: auto; padding-top: 100px;">
            <h1>Favor revisa que la URL sea la correcta.</h1>
        </div>
    </div>

</div>
</body>
</html>