<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($nombre, $email, $desde, $hasta, $cabanas, $pasajeros, $mensaje)
    {
        $this->nombre   = $nombre;
        $this->email    = $email;
        $this->desde    = $desde;
        $this->hasta    = $hasta;
        $this->cabanas  = $cabanas;
        $this->pasajeros= $pasajeros;
        $this->mensaje  = $mensaje;
    }

    public function build()

    {
        return $this->view('page.mail')->with([
                        'nombre' => $this->nombre,
                        'email' => $this->email,
                        'desde' => $this->desde,
                        'hasta' => $this->hasta,
                        'cabanas' => $this->cabanas,
                        'pasajeros' => $this->pasajeros,
                        'mensaje' => $this->mensaje, 
                        ]);

    }

}

