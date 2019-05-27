@extends('public.template')
@section('inc')
    <div class="box">
        <div class="title">
            <h2>mi perfil</h2>
        </div>
        <div class="box-tab">
            <ul class="tab">
                <li><a href="javascript:void(0)" class="tablinks active" onclick="openCity(event, 'profile')">MIS DATOS
                        PERSONALES</a></li>
                <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'config')">CONFIGURACIÓN</a>
                </li>
            </ul>
            <ul>
                <li id="profile" class="tabcontent" style="display: block;">
                    @include('private.inc.personal-information')
                </li>
                <li id="config" class="tabcontent" style="display: none;">
                    @include('private.inc.change-password')
                </li>
            </ul>
        </div>
    </div>
@endsection