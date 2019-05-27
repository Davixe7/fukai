<div class="box-one">
    <ul class="one-prod">
        <li>
            <figure>
              <img src="{{ route('get.image', str_replace('/','',$product->image)) }}" alt="img" />
            </figure>
            <figcaption>
                <h2>{{ $product->name }}</h2>
                <div class="name-pdto">
                    <p>{{ $product->extract }}</p>
                </div>
                <div class="price-pdto">
                    <span>${{ number_format($product->price_before, 0, '', '.') }}</span>
                    <h3>${{ number_format($product->price, 0, '', '.') }}</h3>
                    <a href="#" data-add="{{ route('add',$product->slug) }}" class="add-pdto ctl-add"></a>
                </div>
            </figcaption>
        </li>
    </ul>
    <div class="clear">
        @include('public.inc.banner')
    </div>
</div>
    