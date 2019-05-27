<div class="shadow register">
    <form action="#" id="registerForm" class="dialog" data-url="{{ route('register') }}" method="post">
        <a href="#" class="close">X</a>
        <h2>Regístrate</h2>
        <ul class="errorsDialog errorsRegister"></ul>
        <input type="text" name="name" placeholder="Nombre y Apellido" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <div style="width:18%; float:left; padding-top:10px;"><span >+56 9</span></div><input style="width:72%; float:right;" type="text" name="phone" placeholder="Teléfono" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="password" name="password_confirmation" placeholder="Repita Contraseña" required>
        {!! csrf_field() !!}
        <div>
            <button type="button" id="btnRegister">REGÍSTRAR</button>
        </div>
    </form>
</div>
