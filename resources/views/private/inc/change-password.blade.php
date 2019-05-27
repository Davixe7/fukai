<h2>Cambiar contraseña</h2>
<ul class="errorsDialog errorsChangePass"></ul>
<form action="#" data-url="{{ route('user.change.password') }}" method="post" id="changePassForm">
    <input type="hidden" name="_method" value="PUT">
    <label>Nueva</label>
    <input name="password" type="password"/>
    <label>Reingresar nueva</label>
    <input name="password_confirmation" type="password"/>
    {!! csrf_field() !!}
    <a type="button" id="btnChangePass" href="#" class="save">Cambiar contraseña</a>
</form>