<header>
    <a class="logo" href="{{ route('index') }}">
        <img src="{{ asset('img/logo-fukai.png')}}" alt="logo">
        <img src="{{ asset('img/25-fukai2.png')}}" alt="25">.......
    </a>
    <nav>
        @include('public.inc.nav')
        @if(Auth::check())
            <a href="{{ route('purchase.order') }}" class="top-shart">
                <span id="ctl-countcart">{{ Cart::count() }}</span>
            </a>
        @else
            <a href="#" data-locationurl="{{ route('purchase.order') }}" class="top-shart log">
                <span id="ctl-countcart">{{ Cart::count() }}</span>
            </a>
        @endif
    </nav>
</header>