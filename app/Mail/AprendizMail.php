<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AprendizMail extends Mailable
{
    public $aprendiz;
    public $accion;
    public $cambios;

    public function __construct($aprendiz,$accion,$cambios = [])
    {
        $this->aprendiz = $aprendiz;
        $this->accion = $accion;
        $this->cambios = $cambios;
    }

    public function build()
    {
        return $this->subject('Notificación del sistema')
            ->view('emails.aprendiz');
    }
}
