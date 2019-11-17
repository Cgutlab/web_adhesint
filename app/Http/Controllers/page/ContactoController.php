<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Contacto;
use App\Data;
use App\Correo;
use App\Metadato;
use App\Http\Requests\ContactoRequest;

class ContactoController extends Controller
{
    public function enviarMail(Request $request) {
      $datos = Data::where('type', 'correo')->first();

      $nombre = $request->input('nombre');

      Mail::send('page.mail', ['nombre'=> $request->input('nombre'),
                                'localidad' => $request->input('localidad'),
                                'email' => $request->input('email'),
                                'telefono' => $request->input('telefono'),
                                'mensaje' => $request->input('mensaje'),
                                'imagen' => $request->input('imagen')
                              ], function ($message) use ($nombre) {
          $dato = Data::where('type', 'correo')->first();
          $message->from('info@italplast.com', 'WEB | Contacto');
          $message->to($dato->text);
          $message->subject('Contacto de ' . $nombre);
      });

      if (count(Mail::failures()) > 0) {
          $success = 'Ha ocurrido un error al enviar el correo';
      }else{
          $success = 'Correo enviado correctamente';
      }

      return back()->with('success', $success);
    }
}
