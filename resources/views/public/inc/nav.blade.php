<a href="#" class="navmob"><span></span><span></span><span></span></a>
<ul class="nav-top">
    <li><a class="{{ isActiveRoute('index', 'sel') }}" href="{{ route('index') }}">INICIO</a></li>
    {{--<li><a class="{{ isActiveRoute('nosotros', 'sel') }}" href="{{ route('nosotros') }}">NOSOTROS</a></li> --}}
    <li><a class="{{ isActiveRoute('restaurant', 'sel') }}" href="{{ route('restaurant') }}">RESTAURANTES</a></li>
    <li><a class="cont" href="#">CONTACTO</a></li>
    @if(Auth::check())
        <li class="dropdown">
            <a id="username" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                <span id="ctl-username">{{ explode(' ', Auth::user()->name)[0] }}</span>&nbsp;<i class="user-ico"></i><span
                        class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a class="{{ isActiveRoute('user.perfil', 'sel') }}" href="{{ route('user.perfil') }}">Mi perfil</a></li>
                <li><a class="{{ isActiveRoute('user.addresses', 'sel') }}" href="{{ route('user.addresses') }}">Mis Direcciones</a></li>
                <li><a class="{{ isActiveRoute('my.purchases', 'sel') }}" href="{{ route('my.purchases') }}">Mis Compras</a></li>
                <li><a href="{{route('logout')}}">Finalizar Sesión</a></li>
            </ul>
        </li>
    @else
        <li><a class="log" href="#">INGRESAR</a></li>
    @endif
</ul>


