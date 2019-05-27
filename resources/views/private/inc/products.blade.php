<div class="box-detail-pdto">
  @include('private.inc.slider-product')
  <form action="{{ route('order.create') }}" data-url="{{ route('order.create') }}" id="confirmForm" method="POST">
    <div class="overflow-pdto">
      <div class="type-pay">
        <div class="container-type-pay">
          <h2>Seleccione despacho</h2>
          <ul>
            <li>
              <input type="radio" id="d-option" name="deliveryplace" value="Domicilio" checked>
              <label for="d-option">Domicilio</label>
              <div class="check"></div>
            </li>
            <li>
              <input type="radio" id="l-option" name="deliveryplace" value="Local">
              <label for="l-option">Retiro en local</label>

              <div class="check">
                <div class="inside"></div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="type-pay ctl-delivery-local">
        <div class="container-type-pay">
          <h2>Seleccione sucursal</h2>
          <ul>
            <li>
              <select name="delivery_office_id" id="delivery_office_id" required>
                <option value="">Seleccione...</option>
                @foreach($aTowns as $aTown)
                @foreach($aTown->offices as $office)
                <option value="{{ $office->id }}">{{ $office->name.' '.$office->check_office_open }}</option>
                @endforeach
                @endforeach
              </select>
              <input id="ctl-name-office" type="hidden" name="nameoffice" value="">
            </li>
          </ul>
        </div>
      </div>
      <div class="type-pay clt-delivery-home">
        <div class="container-type-pay">
          <h2>Forma de pago</h2>
          <ul>
            <li>
              <input type="radio" id="f-option" name="billing" value="efectivo" checked>
              <label for="f-option">Efectivo</label>
              <div class="check"></div>
            </li>
            <li>
              <input id="cash" name="cash" type="text" placeholder="$ MONTO CON QUE PAGAS"/>
            </li>
            <li>
              <input type="radio" id="s-option" name="billing" value="redcompra">
              <label for="s-option">Red Compra a domicilio</label>

              <div class="check">
                <div class="inside"></div>
              </div>
            </li>
          </ul>
        </div>
        <label>Comentario:</label>
        <textarea name="comments" id=""
        placeholder="DANOS ALGUNA REFERENCIA O COMENTARIO POR EJEMPLO: SEGUNDO PISO,PORT�0�7N NEGRO,TIMBRE MALO,CUIDADO CON EL PERRO."
        cols="20" rows="5"></textarea>
      </div>
      <div class="type-address clt-delivery-home">
        <h2>Dirección de despacho</h2>
        <ul>
          <li>
            <select id="ctl-add-address" name="address_town_id" required>
              <optgroup>
                <option value="">Seleccione...</option>
                <option value="" data-address="{{ route('user.addresses') }}">Agregar</option>
              </optgroup>
              <optgroup label="Tus direcciones">
                @foreach($aAddresses as $aAddress)
                  @if( $aAddress->town->id != 1 )
                    <option data-price="{{ number_format($aAddress->town->offices[0]->delivery_price, 0, '', '.') }}" value="{{ $aAddress->id.', '.$aAddress->town->id}}">{{ $aAddress->address.' '. $aAddress->check_office_open}}</option>
                  @endif
                @endforeach
              </optgroup>
            </select>
            <input id="ctl-fulladdress" type="hidden" name="fulladdress" value="">
          </li>
          <li>
            <div id="ctl-new-address" class="new-address">
              <label>Nueva direcci��n:</label>
              <input id="ctl-address" name="address" type="text"/>
              <select id="ctl-towns" name="town_id" id="" class="sel-address">
                <option value="">Comuna</option>
                  @foreach($aTowns as $aTown)
                    <option data-price="{{ number_format($aTown->offices[0]->delivery_price, 0, '', '.') }}" value="{{ $aTown->id }}">{{ $aTown->name }}</option>
                  @endforeach
              </select>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="box-pay">
      <ul class="errorsDialog errorsOrder"></ul>

      <span>VALOR COMPRA</span>
      <h2>${{ number_format(Cart::total(), 0, '', '.') }}</h2>
      <span id="ctl-delivery-text"></span>
      <h3 id="ctl-delivery-price"></h3>

      <h1 id="ctl-total-delivery" data-total="{{Cart::total()}}"></h1>
      @if(Cart::count()>0)
      <button type="button" id="btn-confirm" class="pay-total">Confirmar</button>
      @else
      <button type="button" class="pay-total" disabled>Confirmar</button>
      @endif
      <p id="delivery_price"></p>
    </div>
    {!! csrf_field() !!}
  </form>
</div>
