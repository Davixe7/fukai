<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\SocialTrait;
use App\User_data;
use Validator;
use Auth;
use Response;
use Log;
use Cart;


class SitcoAuthController extends Controller
{
    use SocialTrait;

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return Response::json(array(
                    'error' => true,
                    'errors' => $validator->getMessageBag()->toArray())
            );
        }
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            if ($request->has('datalocation')) {
                return Response::json(array(
                    'error' => false,
                    'location' => $request->datalocation
                ));
            } else {
                return Response::json(array(
                    'error' => false,
                ));
            }
        }
        return Response::json(array(
            'error' => true,
            'errors' => array('Contraseña incorrecta'),
        ));
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|max:20|',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return Response::json(array(
                    'error' => true,
                    'message' => 'Hay valores incorrectos en el formulario',
                    'errors' => $validator->getMessageBag()->toArray())
            );
        }
        $request['phone'] = '+569' . $request['phone'];
        Auth::login($this->create($request->all()));
        return Response::json(array(
            'error' => false,
            'datalocation' => route('user.addresses')
        ));
    }

    protected function cleanChar(Request $request)
    {
        $aSearchChar = array(' ', '.', ',', '-', '/');
        $aReplaceChar = array('', '', '', '', '');
        $request['dni'] = str_replace($aSearchChar, $aReplaceChar, $request['dni']);
        return $request;
    }

    public function logout()
    {
        Auth::logout();
        Cart::destroy();
        return redirect()->route('index');
    }

}
