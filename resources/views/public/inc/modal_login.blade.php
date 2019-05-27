<div class="shadow login">
    <form action="#" id="loginForm" data-url="{{ route('login') }}" class="dialog" method="post">
        <a href="#" class="close">X</a>
        <h2>Ingresar</h2>
        <ul class="errorsDialog errorsLogin"></ul>
        <input type="email" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Contraseña">
        {!! csrf_field() !!}
        <input id="datalocation" type="hidden" name="datalocation" value="">
        <div><button type="button" id="btnLogin">INGRESAR</button></div>
        <p><a class="recover-link" href="#">Recuperar contraseña, aquí</a></p>
        <a class="register-btn" href="#">REGÍSTRATE EN FUKAI <i>Delivery</i></a>
    </form>
</div>