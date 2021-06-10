<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Mail;

class ContactoController extends Controller
{
    public function contacto(){
        return view('productos.contacto');
    }
    public function enviarContacto(Request $request){
        try{
        Mail::send('emails.emailcontacto',[
            'nombre'=>$request->nombre,
            'email'=>$request->email,
            'telefono'=>$request->telefono,
            'mensaje'=>$request->mensaje
        ],function($mail)use($request){
            $mail->from(env('MAIL_FROM_ADDRESS'),$request->nombre);
            $mail->to('supermercadotest@gmail.com')->subject('Contactanos por mensaje.');
        });
        return redirect()->route('inicio')->with('mensaje', "Mensaje enviado con éxito.");
    }catch(Exception $ex){
        return redirect()->route('inicio')->with('error', "No se ha enviado el mensaje.".$ex->getMessage());
    }

    }
}
