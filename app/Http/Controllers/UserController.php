<?php

namespace App\Http\Controllers;

use App\Delivery_office;
use App\User;
use App\User_address;
use App\Delivery_town;
use App\User_data;
use Illuminate\Http\Request;
use Auth;
use Response;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ShedulerTrait;

class UserController extends Controller
{
    use ShedulerTrait;
    public function getPerfil()
    {
        $aUser = User::find(Auth::user()->id);
        $aDeliTowns = Delivery_town::where('status', 1)->get();
        return view('private.perfil', compact('aUser', 'aDeliTowns'));
    }

    public function putInformation(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|max:20|',
            'birthdate' => 'date_format:Y-m-d',
        ];
        if ($response = $this->validatorResponse($request, $rules)) {
            return $response;
        }
        $aUser = User::find(Auth::user()->id);
        $aUser->name = $request->name;
        $aUser->email = $request->email;
        $aUser->save();
        $aUserdata = User_data::where('user_id', Auth::user()->id)->first();
        $aUserdata->phone = $request->phone;
        $aUserdata->birthdate = $request->birthdate;
        $aUserdata->save();
    }

    public function postCreateAddress(Request $request)
    {
//        dd($request->fullAddress);
        $rules = [
            'fullAddress' => 'required|max:255',
        ];
        if ($response = $this->validatorResponse($request, $rules)) {
            return $response;
        }
        $sAddress_coords = str_replace(['(',')'],'',$request->address_coords);
        $oAdresses = User_address::where('user_id', Auth::user()->id)->get();
        foreach ($oAdresses as $adress){
            if ($adress->distance($sAddress_coords) < 15 && $adress->distance($sAddress_coords)!==false){
                return Response::json(array(
                        'error' => true,
                        'errors' => array('Esta dirección ya la tienes ingresada'))
                );
            }
        }
        if(User_address::where('address',$request->fullAddress)->where('delivery_town_id',$request->town_id)->where('user_id', Auth::user()->id)->exists()){
            return Response::json(array(
                    'error' => true,
                    'errors' => array('Esta dirección ya la tienes ingresada'))
            );
        }
        User_address::create([
            'address' => $request->fullAddress,
            'address_coords' => $sAddress_coords,
            'user_id' => Auth::user()->id,
            'delivery_town_id' => $request->town_id,
        ]);
        $aDeliTowns = Delivery_town::where('status', 1)->get();
        $aUser = User::find(Auth::user()->id);
        $bOfficeOpen = $this->scheduler_active(Delivery_town::find($request->town_id)->offices()->first()->scheduler_code);
        return Response::json([
            'view' => view('private.inc.addresses', compact('aDeliTowns', 'aUser'))->render(),
            'office_open' => $bOfficeOpen,
        ]);
    }

    public function getDeleteAddress($id)
    {
        $delete = User_address::where('id', $id)->where('user_id', Auth::user()->id)->delete();
        if ($delete) {
            $aDeliTowns = Delivery_town::where('status', 1)->get();
            $aUser = User::find(Auth::user()->id);
            return Response::json(view('private.inc.addresses', compact('aDeliTowns', 'aUser'))->render());
        }
    }

    public function putChangePass(Request $request)
    {
        $rules = [
            'password' => 'required|confirmed|min:6',
        ];
        if ($response = $this->validatorResponse($request, $rules)) {
            return $response;
        }
        $aUser = User::find(Auth::user()->id);
        $aUser->password = bcrypt($request->password);
        $aUser->save();
    }

    public function getAddress(){
        $aUser = User::find(Auth::user()->id);
        return view('private.my-addresses', compact('aUser'));
    }

    protected function validatorResponse($request, $rules)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json(array(
                    'error' => true,
                    'errors' => $validator->getMessageBag()->toArray())
            );
        }
        return false;
    }
}
