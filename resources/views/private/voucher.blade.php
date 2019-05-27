@extends('public.template')
@section('inc')
    <div class="voucher">
        <script>
        fbq('track', 'Purchase');
        </script>
        <div>
            <img src="{{ asset('img/header-voucher.jpg') }}" alt="header-fukai" style="width:100%;" />
        </div>
        <h1>Orden {{ $aOrder->purchase_code }}</h1>
        <ul>
            <li>Nombre</li>
            <li>{{ $aOrder->user->name }}</li>
            <li>Télefono</li>
            <li>{{ $aOrder->user->userData->phone }}</li>
            <li>Dirección despacho</li>
            <li>{{ $aOrder->deliveryOrder->full_address }}</li>
            <li>Sucursal origen</li>
            <li>{{ $aOrder->deliveryOrder->deliveryOffice->name }}</li>
            <li>Comentario</li>
            <li>&nbsp;{{ $aOrder->deliveryOrder->customer_comments }}</li>
            <li>Comentario Delivery</li>
            <li>&nbsp;{{ $aOrder->deliveryOrder->operator_comments }}</li>
            <li>Tiempo de entrega</li>
            <li>&nbsp Entre 45 y 60 minutos</li>
            <li>Lugar de despacho</li>
            <li>&nbsp;{{ $aOrder->deliveryOrder->delivery_place }}</li>
            <li>Medio de pago</li>
            <li>{{ $aOrder->deliveryOrder->payment }}</li>
            @if($aOrder->deliveryOrder->cash)
                <li>Monto Efectivo</li>
                <li>${{ number_format($aOrder->deliveryOrder->cash, 0, '', '.') }}</li>
            @endif
            <li>Estado</li>
            <li>{{ $aOrder->deliveryOrder->	stage }}</li>
            <li>Fecha</li>
            <li>{{ strftime('%d/%b/%Y %H:%M', strtotime($aOrder->created_at)) }}</li>
            <li class="no-border sello">&nbsp;</li>
            <li>
                <ul class="pedido">
                    @foreach($aOrder->historicalOrderProduct as $aProduct)
                        <li>
                            {{ $aProduct->qty.' x '.$aProduct->name }}
                        </li>
                        <li>
                            ${{ number_format($aProduct->price * $aProduct->qty, 0, '', '.') }}
                        </li>
                    @endforeach
                    @if($aOrder->deliveryOrder->delivery_place == 'Domicilio')
                        <li>
                            Despacho
                        </li>
                        <li>
                            ${{ number_format($aOrder->deliveryOrder->deliveryOffice->delivery_price, 0, '', '.')}}
                        </li>
                    @endif
                    <li class="no-border total"><b>Total sin descuento:</b></li>
                    <li class="no-border total old-price">
                        <b>${{ number_format($aOrder->amount_before, 0, '', '.') }}</b></li>
                    <li class="no-border total"><b>Total Pedido:</b></li>
                    <li class="no-border total"><b>${{ number_format($aOrder->amount, 0, '', '.') }}</b></li>
                </ul>
            </li>
        </ul>
        <div>
            <img src="{{ asset('img/footer-voucher.jpg') }}" alt="header-fukai" style="width:100%;" />
        </div>
    </div>

@endsection