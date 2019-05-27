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
                {{--@if(Auth::check())--}}
                    {{--<li class="dropdown">--}}
                        {{--<a id="username" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                           {{--aria-expanded="false">--}}
                            {{--<span id="ctl-username">{{ explode(' ', Auth::user()->name)[0] }}</span>&nbsp;<i class="user-ico"></i><span--}}
                                    {{--class="caret"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{ route('user.perfil') }}">Mi perfil</a></li>--}}
                            {{--<li><a href="{{ route('my.purchases') }}">Mis Compras</a></li>--}}
                            {{--<li><a href="{{route('logout')}}">Finalizar Sesión</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@else--}}
                    {{--<li><a class="log" href="#">INGRESAR</a></li>--}}
                {{--@endif--}}
            </ul>
            {{--@if(Auth::check())--}}
                {{--<a href="{{ route('purchase.order') }}" class="top-shart">--}}
                    {{--<span id="ctl-countcart">{{ Cart::count() }}</span>--}}
                {{--</a>--}}
            {{--@else--}}
                {{--<a href="#" class="top-shart log">--}}
                    {{--<span id="ctl-countcart">{{ Cart::count() }}</span>--}}
                {{--</a>--}}
            {{--@endif--}}
        </nav>
    </header>
    <div style="margin: auto;">
        <form method="POST" action="{{ route('reset.pass') }}" style="width: 50%; margin: auto;">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">

            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password">
            </div>

            <div>
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation">
            </div>

            <div>
                <button type="submit">
                    Resetear Password
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

