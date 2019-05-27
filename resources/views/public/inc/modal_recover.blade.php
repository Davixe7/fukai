<div class="shadow recover">
    <form action="#" class="dialog" id="recoverForm" data-recover="{{ route('recover.pass') }}" method="post">
        <a href="#" class="close">X</a>
        <h2>RECUPERAR CONTRASEÑA</h2>
        <ul class="errorsDialog errorsRecover"></ul>
        <input name="email" type="email" placeholder="E-mail" required>
        {!! csrf_field() !!}
        <div>
            <button type="button" id="btnRecover">RECUPERAR</button>
        </div>
    </form>
</div>