<aside class="aside-left">
    <ul class="nav-aside">
        @foreach($aCategories as $category)
            @if($category->slug == $slug)
                <li><a href="{{ route('menu.product',$category->slug) }}" class="sel">{{ $category->name }}</a></li>
            @else
                <li><a href="{{ route('menu.product',$category->slug) }}">{{ $category->name }}</a></li>
            @endif
        @endforeach
    </ul>

    @if($aHighlights)
        <!--
        <div class="title-out">PRODUCTO DESTACADO</div>
        <ul class="outstanding">
            @foreach($aHighlights as $aHighlight)
                <li>
                    <a href="{{ route('carta.product', $aHighlight->slug) }}">
                        <figure>
                            <img src="{{ route('get.image', str_replace('/','',$aHighlight->image)) }}" alt="img"/>
                        </figure>
                    </a>
                    <figcaption>
                        <h2>{{ $aHighlight->name }}</h2>
                        <div class="price-pdto">
                            <span>${{ number_format($aHighlight->price_before, 0, '', '.') }}</span>
                            <h3>${{ number_format($aHighlight->price, 0, '', '.') }}</h3>
                        </div>
                        <div class="action-pdto">
                            <a href="#" onclick="return false" data-add="{{ route('add',$aHighlight->slug) }}"
                               class="add-pdto ctl-add"></a>
                        </div>
                    </figcaption>
                </li>
            @endforeach
        </ul>
    -->
    @endif
</aside>