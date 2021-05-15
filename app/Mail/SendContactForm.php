<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public string $txtSubject;
    public string $txtMensaje;

    public function __construct(string $sub, string $men)
    {
        $this->txtSubject = $sub;
        $this->txtMensaje = $men;
    }

    public function build()
    {
        return $this
            ->subject("Formulario de contacto de la Tienda ".config("app.name"))
            ->markdown("email.contacto");
    }
}
