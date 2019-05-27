<div class="title-product">
    <h2>{{ $sTitle }}</h2>
</div>
<ul class="products">
    @foreach($aProducts as $product)
        <li>
            <a href="{{ route('carta.product', $product->slug) }}">
                <figure>
                  <img src="{{ route('get.image', str_replace('/','',$product->image)) }}" alt="img" />
                </figure>
            </a>
            <figcaption>                
                <h2>{{ $product->name }}</h2>
                <!-- <div class="name-pdto nano" id="about">
                    <p class="nano-content">{{ $product->extract }}&nbsp;<br />&nbsp;</p>
                </div> -->
                <div class="price-pdto">
                    <span>${{ number_format($product->price_before, 0, '', '.') }}</span>
                    <h3>${{ number_format($product->price, 0, '', '.') }}</h3>
                </div>
                <div class="action-pdto">
                    <a href="#" data-add="{{ route('add',$product->slug) }}" onclick="return false" class="add-pdto ctl-add"></a>
                </div>
            </figcaption>
        </li>
    @endforeach
</ul>
{!! $aProducts->render() !!}