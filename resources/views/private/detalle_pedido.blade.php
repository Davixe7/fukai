@extends('public.template')
@section('inc')
    <div class="box">
    	<div class="title">
    		<h2>DETALLE DEL PEDIDO</h2>
    	</div>
        <div id="ctl-products">
            @include('private.inc.products')
        </div>
    </div>
@endsection