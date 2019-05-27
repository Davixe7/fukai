<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store_product;
use App\Delivery_town;
use App\User_address;
use Session;
use Response;
use Cart;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
//        if (!Session::has('ready')) Session::put('ready', true);
    }

    public function getAdd(Store_product $product, $ruta = '')
    {
        Cart::add($product->id, $product->name, 1, $product->price, 0, array(
            'price_before' => $product->price_before,
            'slug' => $product->slug,
            'img' => $product->image,
            'description' => $product->description,
            'extract' => $product->extract
        ));
        $iSubTotal = 0;
        foreach (Cart::content() as $item) {
            $iSubTotal += $item->options->price_before * $item->qty;
        }
        if ($ruta == 'order') {
            $aAddresses = User_address::where('user_id', Auth::user()->id)->get();
            $aTowns = Delivery_town::where('status', 1)->get();
            return Response::json(view('private.inc.products', compact('aTowns', 'aAddresses', 'iSubTotal'))->render());
        }
        Session::put('ready', true);
        return Response::json(view('public.inc.check-out', compact('iSubTotal'))->render());
        
    }

    //show cart
    public function show()
    {
        $cart = Cart::content();
        $total = Cart::total();
        return view('public.cart', compact('cart', 'total'));
    }

    // destroy cart
    public function getDestroy()
    {
        Cart::destroy();
        return redirect()->route('index');
    }

    // delete item cart
    public function getDelete($rowId, $ruta = '')
    {
        Cart::remove($rowId);
        $iSubTotal = 0;
        foreach (Cart::content() as $item) {
            $iSubTotal += $item->options->price_before * $item->qty;
        }
        if ($ruta == 'order') {
            $aAddresses = User_address::where('user_id', Auth::user()->id)->get();
            $aTowns = Delivery_town::where('status', 1)->get();
            return Response::json(view('private.inc.products', compact('aTowns', 'aAddresses', 'iSubTotal'))->render());
        }
        return Response::json(view('public.inc.check-out', compact('iSubTotal'))->render());
    }

    //update item cart
    public function getUpdate($rowId, $ruta = '')
    {
        $iQtyTotal = Cart::get($rowId)->qty;
        $iQtyTotal--;
        Cart::update($rowId, $iQtyTotal);
        $iSubTotal = 0;
        foreach (Cart::content() as $item) {
            $iSubTotal += $item->options->price_before * $item->qty;
        }
        if ($ruta == 'order') {
            $aAddresses = User_address::where('user_id', Auth::user()->id)->get();
            $aTowns = Delivery_town::where('status', 1)->get();
            return Response::json(view('private.inc.products', compact('aTowns', 'aAddresses', 'iSubTotal'))->render());
        }
        return Response::json(view('public.inc.check-out', compact('iSubTotal'))->render());
    }

    public function order_detail()
    {
        $cart = Cart::content();
        if (!count($cart)) {
            return redirect()->route('show-cart');
        }
        $aDatosTBK = $this->TBK($cart);
        return view('private.order-detail', compact('cart', 'aDatosTBK'));
    }
}
