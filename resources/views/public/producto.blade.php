@extends('public.template')
@section('inc')
    <div class="box-wrap">
        @include('public.inc.aside')
        @include('public.inc.product')
        <aside id="ctl-cartcontent" class="aside-out">
            @include('public.inc.check-out')
        </aside>
    </div>
@endsection