<?php

namespace App\Http\Controllers;

use App\Delivery_office;
use App\Delivery_order;
use App\Delivery_town;
use App\Store_historical_order_product;
use App\Store_order;
use App\User_address;
use Illuminate\Http\Request;
use Auth;
use Cart;
use Session;
use Validator;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail; //temporal
use App\Http\Controllers\Traits\ShedulerTrait;

class PurchaseOrderController extends Controller
{
    use ShedulerTrait;
    public function getPurchaseOrder()
    {
        $aAddresses = User_address::where('user_id', Auth::user()->id)->get();
        $aTowns = Delivery_town::where('status', 1)->get();
        return view('private.detalle_pedido', compact('aTowns', 'aAddresses'));
    }

    public function postOrder(Request $request)
    {
        if (Cart::count() < 1) {
            return Response::json(array(
                'error' => true
            ));
        }
        $iDelivery_price = 0;
        $sFullAddress = $request->fulladdress;
        if ($request->deliveryplace == 'Domicilio') {
            //validate address
//            if ($request->address_town_id == 'agregar') {
//                $rules = ['address' => 'required', 'town_id' => 'required|exists:delivery_towns,id',];
//                $response = $this->validatorResponse($request, $rules);
//                if ($response) {
//                    return $response;
//                }
//                //read price db
//                $aTown = Delivery_town::find($request->town_id);
//                $sFullAddress = $request->address . ', ' . $aTown->name;
//                $iIdOffice = $aTown->offices[0]->id;
//                $iDelivery_price = $aTown->offices[0]->delivery_price;
//            } else {
            $rules = ['address_town_id' => 'required'];
            $response = $this->validatorResponse($request, $rules);
            if ($response) {
                return $response;
            }
            //read price db
            $aAddressTown = explode(',', $request->address_town_id);
            $iIdOffice = Delivery_town::find($aAddressTown[1])->offices[0]->id;
            $iDelivery_price = Delivery_town::find($aAddressTown[1])->offices[0]->delivery_price;;
//            }

            $iTotalValidate = Cart::total() + $iDelivery_price;
            if ($iTotalValidate < 12500) {
                return Response::json(array(
                        'error' => true,
                        'errors' => array('Despacho a domicilio solo esta disponible si su pedido supera los $12.500'))
                );
            }

            //validate all()
            $sPayment = 'Débito';
            //Pregunta si es efectivo
            if ($request->billing == 'efectivo') {
//            genera reglas para validar el campo cash
                $rules = ['cash' => 'required|numeric|min:' . $iTotalValidate];
//            envia datos a validador
                $response = $this->validatorResponse($request, $rules);
//            si hay errores retorna
                if ($response) {
                    return $response;
                }
                $sPayment = 'Efectivo';
            }
            //insert db
//            if ($request->address_town_id == 'agregar') {
//                if (User_address::where('address', $request->address)->where('delivery_town_id', $request->town_id)->where('user_id', Auth::user()->id)->exists()) {
//                    return Response::json(array(
//                            'error' => true,
//                            'errors' => array('Dirección ya fue ingresada'))
//                    );
//                } else {
//                    User_address::create([
//                        'address' => $request->address,
//                        'comment' => $request->comments,
//                        'user_id' => Auth::user()->id,
//                        'delivery_town_id' => $request->town_id
//                    ]);
//                }
//            }
        } else {
            $rules = ['delivery_office_id' => 'required',];
            $response = $this->validatorResponse($request, $rules);
            if ($response) {
                return $response;
            }
            $sPayment = 'Otro';
            $sFullAddress = $request->nameoffice;
            $iIdOffice = $request->delivery_office_id;
        }

        $oDeliveryOfiice = Delivery_office::find($iIdOffice);
        if ($this->scheduler_active($oDeliveryOfiice->scheduler_code) === false) {
            return Response::json(array(
                    'error' => true,
                    'errors' => array('La sucursal '.$oDeliveryOfiice->name.' se encuentra fuera de horario delivery'))
            );
        }
        $iSubTotal = 0;
        foreach (Cart::content() as $item) {

            $iSubTotal += $item->options->price_before * $item->qty;
        }
        $iSubTotal += $iDelivery_price;
        $aStoreOrder = Store_order::create([
            'purchase_code' => uniqid('cod_'),
            'amount' => Cart::total() + $iDelivery_price,
            'amount_before' => $iSubTotal,
            'user_id' => Auth::user()->id
        ]);
        $aStoreOrder->purchase_code = 'FK' . str_pad($aStoreOrder->id, 4, '0', STR_PAD_LEFT);
        $aStoreOrder->save();
        $aProducts = array();
        $aHistorical = array();
        foreach (Cart::content() as $item) {
            $aProducts[$item->id] = ['qty' => $item->qty];
            $aHistorical[] = [
                'qty' => $item->qty,
                'name' => $item->name,
                'description' => $item->options->description,
                'extract' => $item->options->extract,
                'price' => $item->price,
                'price_before' => $item->options->price_before,
                'image' => $item->options->img,
                'order_id' => $aStoreOrder->id,
            ];
        }
        $aStoreOrder->products()->attach($aProducts);
        Store_historical_order_product::insert($aHistorical);
        Delivery_order::create([
            'code' => $aStoreOrder->purchase_code,
            'delivery_place' => $request->deliveryplace,
            'full_address' => str_replace('(Local cerrado)','',$sFullAddress),
            'customer_comments' => $request->comments,
            'payment' => $sPayment,
            'cash' => $request->cash,
            'delivery_office_id' => $iIdOffice,
            'store_order_id' => $aStoreOrder->id,
        ]);
        Cart::destroy();
        Session::flash('flash_mensage', 'Su pedido ha sido enviado correctamente');

//enviar email temporalmente a Fukai owner
        $oStoreOrder = Store_order::with('deliveryOrder.deliveryOffice', 'historicalOrderProduct', 'user.userData')->find($aStoreOrder->id);
        $oStoreOrder->deliveryOrder->deliveryOffice->delivery_price;
        $aOrder = $oStoreOrder->toArray();

        Mail::send('emails.voucher', $aOrder, function ($message) {
            $message->to('nicolas.rosen@fukai.cl')
                ->cc('paul@fukai.cl')
                ->subject('Fukai Sushi delivery - Estado del pedido');
        });

        return Response::json(array(
            'url' => route('voucher', $aStoreOrder->purchase_code),
        ));
    }

    public
    function getVoucher($nro)
    {
        $aOrder = Store_order::where('purchase_code', $nro)->where('user_id', Auth::user()->id)->first();
        if ($aOrder) {
            $iTimestamp = strtotime(date('Y-m-d') . ' ' . $aOrder->deliveryOrder->delivery_time);
            if ($iTimestamp && $iTimestamp > 0) {
                if (date('G', $iTimestamp) == 0) $sDeliveryTime = strftime('%M Minutos', $iTimestamp);
                elseif (date('G', $iTimestamp) == 1 && date('i', $iTimestamp) == 0) $sDeliveryTime = strftime('%k Hora', $iTimestamp);
                else $sDeliveryTime = strftime('%H:%M Hrs.', $iTimestamp);
            } else $sDeliveryTime = '45 Minutos';
            return view('private.voucher', compact('aOrder', 'sDeliveryTime'));
        }
    }

    public
    function getMyOrders()
    {
        $aOrders = Store_order::where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(6);
        return view('private.mis_pedidos', compact('aOrders'));
    }

    protected
    function validatorResponse($request, $rules)
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

    public
    function getRepeatOrder($sOrder)
    {
        $aOrder = Store_order::where('purchase_code', $sOrder)->where('user_id', Auth::user()->id)->first();
        if ($aOrder) {
            $aCart = array();
            foreach ($aOrder->products as $product) {
                $aCart[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $product->pivot->qty,
                    'price' => $product->price,
                    'discount' => 0,
                    'options' => array(
                        'price_before' => $product->price_before,
                        'slug' => $product->slug,
                        'img' => $product->image,
                        'description' => $product->description,
                        'extract' => $product->extract
                    )];
            }
            Cart::destroy();
            Cart::add($aCart);
            return redirect()->route('purchase.order');
        } else {
            Session::flash('flash_mensage', 'Nro. de Orden no existe :(');
            return redirect()->route('my.purchases');
        }
    }
}
