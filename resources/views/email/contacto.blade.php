@component('mail::message')
    # Hola admin,
    <br>
    <p>
        Has recibido un mensaje desde el formulario de contacto de la Tienda DinoShop
    </p>
    <p>
        Motivo del mensaje: {{ $txtSubject }}
    </p>
    <p>
        {{ $txtMensaje }}
    </p>
@endcomponent
