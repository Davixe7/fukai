@extends('public.template')
@section('inc')
    <div class="box">
        <div class="title">
            <h2>Mis compras</h2>
        </div>
        <div id="ctl-flash">
            @if(Session::has('flash_mensage'))
                <h3>{{Session::get('flash_mensage')}}</h3>
            @endif
        </div>
        @if($aOrders->first())
            <div class="list">
                <ul class="box-list">
                    <li>Fecha</li>
                    <li>Monto</li>
                    <li>Detalle</li>
                    <li>Dirección</li>
                    <li>Estado</li>
                    <li>Acción</li>
                </ul>
                @foreach($aOrders as $aOrder)
                    <ul class="list-content">
                        <li>{{ strftime('%d/%b/%Y %H:%M', strtotime($aOrder->created_at)) }}</li>
                        <li>${{ number_format($aOrder->amount, 0, '', '.') }}</li>
                        <li><a href="{{ route('voucher',$aOrder->purchase_code) }}">{{ $aOrder->purchase_code }}</a>
                        </li>
                        <li>{{ @$aOrder->deliveryOrder->full_address }}</li>
                        <li>{{ @$aOrder->deliveryOrder->stage }} &nbsp;</li>
                        <li class="action-buy">
                            <a href="{{ route('repeat.order', $aOrder->purchase_code )}}"
                               onclick="repeatOrder()">REPETIR
                                PEDIDO</a>
                        </li>
                    </ul>
                @endforeach
            </div>
            {!! $aOrders->render() !!}
        @else
            <div class="title">
                <h3>No has comprado nada :(, elige tus productos <a href="{{ route('index') }}">Aquí</a> </h3>
            </div>
        @endif
    </div>
@endsection
