<div class="custom-scrollbar">
    @if(Cart::count()>0)
        <ul class="products slider-pt">
            @foreach(Cart::content()->reverse() as $oItem)
                <li>
                    <figure>
                        <img src="{{ route('get.image', $oItem->options->img) }}" alt="img"/>
                    </figure>
                    <figcaption>
                        <h2>
                            {{ $oItem->name }}
                            <a href="#" onclick="return false" data-del="{{ route('delete', $oItem->rowid.'/order') }}" class="del-pdto ctl-del-order">x</a>
                        </h2>
                        <div class="price-pdto">
                            <span>${{ number_format($oItem->options->price_before, 0, '', '.') }}</span>
                            <h3>${{ number_format($oItem->price, 0, '', '.') }}</h3>
                        </div>
                        <div class="action-pdto action-order">
                            <a href="#" onclick="return false" data-min="{{ route('update', $oItem->rowid.'/order') }}" class="add-pdto ctl-min-order"></a>
                            <span>{{ $oItem->qty }}</span>
                            <a href="#" onclick="return false" data-add="{{ route('add', $oItem->options->slug.'/order') }}" class="add-pdto ctl-max-order"></a>
                        </div>
                    </figcaption>
                </li>
            @endforeach
        </ul>
    @else
        <div class="nohay">No hay productos en el carrito :(</div>
    @endif

</div>

