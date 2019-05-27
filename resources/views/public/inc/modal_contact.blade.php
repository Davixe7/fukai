<div class="shadow contact">
    <form action="#" class="dialog" id="contactForm" data-url="{{ route('postContact') }}">
        <a href="#" class="close">X</a>
        <h2>Contacto</h2>
        <ul class="errorsDialog errorsContact"></ul>
        <input name="name" type="text" placeholder="Nombre y Apellido">
        <input name="email" type="email" placeholder="E-mail">
        <textarea name="comment" placeholder="Comentarios"></textarea>
        {!! csrf_field() !!}
        <div>
            <button id="btnContact" type="button" >ENVIAR</button>
        </div>
    </form>
</div>