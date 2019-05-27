@extends('public.template')
@section('inc')
    <div class="box">
        <div class="title">
            <h2>mis direcciones</h2>
        </div>
        <ul class="box-address">
            <li>
                @include('private.inc.address-form')
            </li>
            <li id="addresses">
                @include('private.inc.addresses')
            </li>
        </ul>
    </div>
@endsection