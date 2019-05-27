<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use App\Store_order;
use Response;

class MailController extends Controller
{
    public function postSendOrderStatus(Request $request)
    {
//        dd($request->all());
        $oOrder = Store_order::with('deliveryOrder.deliveryOffice', 'historicalOrderProduct','user.userData')
            ->where('purchase_code', $request->purchase_code)->first();        
	$oOrder->deliveryOrder->deliveryOffice->delivery_price;
        $aOrder = $oOrder->toArray();
//        dd($aOrder);
        $aUserMail = User::find($oOrder->user_id);

        Mail::send('emails.voucher', $aOrder, function ($message) use ($aUserMail) {
            $message->to($aUserMail->email)
                    ->bcc('nicolas.rosen@fukai.cl')
                    ->subject('Fukai Sushi delivery - Estado del pedido');
        });
        return Response::json([
            'send' => true
        ]);
    }
}
