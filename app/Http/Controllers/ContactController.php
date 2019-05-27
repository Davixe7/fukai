<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Mail;
use Validator;

class ContactController extends Controller
{
    public function contactAjax(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'comment' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return Response::json(array(
                    'error' => true,
                    'message' => 'Hay valores incorrectos en el formulario',
                    'errors' => $validator->getMessageBag()->toArray())
            );
        }
        Mail::send('emails.contact', $request->all(), function ($message){
            $message->to('contacto@fukai.cl')
                ->subject('Fukai Delivery');
        });
        return Response::json([
            'msg' => 'Mensaje enviado Correctamente'
        ]);
    }
}
