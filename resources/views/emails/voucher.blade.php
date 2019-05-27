<html xmlns="http://www.w3.org/1999/xhtml">
<body style="margin: 0; padding: 0; font-size: 16px; font-family: Arial;">
<div style="width: 700px; margin: 30px auto; border-top:solid 5px #e303fa;">
    <table border="1"
           style="text-transform:uppercase; color:#333; width:100%; border: 1px solid #CCC; border-collapse: collapse;">

        <tr>
            <td colspan="2">
                <img src="{{ asset('img/header-voucher.jpg') }}" alt="header-fukai" style="width:100%;"/>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="text-align:center; letter-spacing: 0.6em; text-transform:uppercase; font-size:30px; padding:30px 0; color:#560497;">
                Orden {{ $purchase_code }}</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;<br/>&nbsp;</td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>{{ $user['name'] }}</td>
        </tr>
        <tr>
            <td>Télefono</td>
            <td>{{ $user['user_data']['phone'] }}</td>
        </tr>
        <tr>
            <td>Dirección despacho</td>
            <td>{{ $delivery_order['full_address'] }}</td>
        </tr>
        <tr>
            <td>SUCURSAL ORIGEN</td>
            <td>{{ $delivery_order['delivery_office']['name'] }}</td>
        </tr>
        <tr>
            <td>Comentario cliente</td>
            <td>{{ $delivery_order['customer_comments'] }}</td>
        </tr>
        <tr>
            <td>Comentario delivery</td>
            <td>{{ $delivery_order['operator_comments'] }}</td>
        </tr>
        <tr>
            <td>Lugar de despacho</td>
            <td>{{ $delivery_order['delivery_place'] }}</td>
        </tr>
        <tr>
            <td>Tiempo de entrega</td>
            <td>Entre 45 y 60 minutos</td>
        </tr>
        <tr>
            <td>Medio de pago</td>
            <td>{{ $delivery_order['payment'] }}</td>
        </tr>
        @if($delivery_order['cash'])
            <tr>
                <td>Monto Efectivo</td>
                <td>${{ number_format($delivery_order['cash'], 0, '', '.') }}</td>
            </tr>
        @endif
        <tr>
            <td>Estado</td>
            <td><b>{{ $delivery_order['stage'] }}</b></td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td>{{ strftime('%d/%b/%Y %H:%M', strtotime($created_at)) }}</td>
        </tr>
        <tr>
            <td style="text-align:center; padding: 10px 0;">
                <img src="{{ asset('img/agua-fukai.jpg') }}" alt="sello-fukai" style="width:200px;"/>
            </td>
            <td>
                <table border="0"
                       style="margin:0; padding:0; width:100%; color:#333; border: 1px solid #CCC; border-collapse: collapse;">
                    @foreach($historical_order_product as $aProduct)
                        <tr>
                            <td>
                                {{ $aProduct['qty'].' x ' }}
                            </td>
                            <td>
                                {{ $aProduct['name'] }}
                            </td>
                            <td>
                                ${{ number_format($aProduct['price'] * $aProduct['qty'], 0, '', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    
                    @if($delivery_order['delivery_place'] == 'Domicilio')
                        <tr>
                            <td></td>
                            <td>
                                Despacho
                            </td>
                            <td>
                                ${{ number_format($delivery_order['delivery_office']['delivery_price'], 0, '', '.')}}
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td></td>
                        <td style="color:#e303fa;">Total sin descuento</td>
                        <td style="color:#e303fa; text-decoration: line-through;">
                            ${{ number_format($amount_before, 0, '', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;<br/>&nbsp;</td>
                    </tr>
                    <tr style="color:#e303fa; font-size:20px;">
                        <td></td>
                        <td>Total Pedido:</td>
                        <td>${{ number_format($amount, 0, '', '.') }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <img src="{{ asset('img/footer-voucher.jpg') }}" alt="header-fukai" style="width:100%;"/>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
