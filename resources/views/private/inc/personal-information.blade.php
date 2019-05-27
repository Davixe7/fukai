<h2>Ingresa tus datos personales</h2>
<ul class="errorsDialog errorsInfo"></ul>
<form action="#" data-url="{{ route('user.information') }}" method="post" id="infoForm">
    <input type="hidden" name="_method" value="PUT">
    <label>Nombre</label>
    <input id="ctl-newusername" name="name" type="text" value="{{ $aUser->name }}"/>
    <label>E-mail</label>
    <input name="email" type="text" placeholder="nombre@correo.com" value="{{ $aUser->email }}"/>
    <label>Fecha de nacimiento</label>
    <input name="birthdate" id="birthdate" type="text" value="{{ $aUser->userData->birthdate }}"/>
    <label>Teléfono</label>
    <input name="phone" type="text" placeholder="+569" value="{{ $aUser->userData->phone }}"/>
    {!! csrf_field() !!}
    <a type="button" id="btnSaveInfo" href="#" class="save">GUARDAR DATOS</a>
</form>