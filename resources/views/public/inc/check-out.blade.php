<div class="check-out">
  <h3>
    MI PEDIDO
    <a class="icon-trash ctl-trash" href="{{ route('destroy') }}"></a>
    <span id="ctl-actualcount">{{ Cart::count() }}</span>
  </h3>
  <ul class="action">
    @foreach( Cart::content()->reverse() as $oItem)
    <li>
      <a href="#" onclick="return false" data-del="{{ route('delete', $oItem->rowid) }}"
        class="del-pdto ctl-del">x</a>
        <h2>{{ $oItem->name }}</h2>
        <div class="act-pdt">
          <a href="#" onclick="return false" data-min="{{ route('update', $oItem->rowid) }}"
            class="add-pdto ctl-min">-</a>
            <span>{{ $oItem->qty }}</span>
            <a href="#" onclick="return false" data-add="{{ route('add',$oItem->options->slug) }}"
              class="add-pdto ctl-max">+</a>
            </div>
            <div class="price">
              @if($oItem->options->has('price_before'))
              <p class="old-price">${{ number_format($oItem->options->price_before, 0, '', '.') }}</p>
              @endif
              <p>${{ number_format($oItem->price, 0, '', '.') }}</p>
            </div>
          </li>
          @endforeach
        </ul>
        <ul class="total-price">
          <li>
            <h4>TOTAL SIN DESCUENTO</h4>
            <p class="old-price">${{ number_format(@$iSubTotal, 0, '', '.') }}</p>
          </li>
          <li>
            <h4>TOTAL A PAGAR</h4>
            <p>${{ number_format(Cart::total(), 0, '', '.') }}</p>
          </li>
        </ul>
        <div class="buy-price">
          @if(Cart::count() > 0)
          @if(Auth::check())
          <a href="{{ route('purchase.order') }}" class="buy-total">HACER PEDIDO</a>
          @else
          <a data-locationurl="{{ route('purchase.order') }}" href="#" class="buy-total log">HACER PEDIDO</a>
          @endif
          @endif
        </div>
      </div>

      <div class="info-costumers">
        <hgroup>
          <h3>HORARIOS DELIVERY</h3>
          <img src="{{ asset('img/delivery.svg') }}" alt="delivery"/>
        </hgroup>
        <ul>
          <li>
            <h4>Bellavista</h4>
            <p>
              12:30 – 24:00 Hrs
              <span class="green animated pulse infinite"></span>
            </p>
          </li>
          <li>
            <h4>Vitacura</h4>
            <p>
              12:00 – 23:00 Hrs
              <span class="green animated pulse infinite"></span>
            </p>
          </li>
          <li>
            <h4>Huechuraba</h4>
            <p>12:30 – 22:00 Hrs<span class="green animated pulse infinite"></span></p>
            <p>Sab. 12:30 – 17:00 Hrs<span class="green animated pulse infinite"></span></p>
            <p>
              Domingos y Festivos Cerrado
              <span class="red"></span>
            </p>
          </li>
        </ul>
      </div>
