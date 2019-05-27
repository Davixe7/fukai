<ul>
    <li>
        <select id="ctl-add-address" name="address" id="" required>
            <option value="">Seleccione...</option>
            <option value="">Agregar</option>
            @foreach($aAddress as $aAddres)
                <option value="{{ $aAddres->id }}">{{ $aAddres->address }}</option>
            @endforeach
        </select>
        {{--Angel Cruchaga Santa Maria #200, Ñuñoa.--}}
        {{--<a href="#">x</a>--}}
    </li>
    <li>
        <form action="#" method="post" id="ctl-new-address" class="new-address" data-url="{{ route('address.order') }}">
            <label>Nueva dirección:</label>
            <input name="address" type="text"/>
            <select name="towns" id="" class="sel-address">
                <option value="">Comuna</option>
                @foreach($aTowns as $aTown)
                    <option value="{{ $aTown->id }}">{{ $aTown->name }}</option>
                @endforeach
            </select>
            {!! csrf_field() !!}
            <button id="btnNewAddres" type="button">Agregar</button>
        </form>
    </li>
</ul>