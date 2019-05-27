<?php

namespace App\Http\Controllers;

use App\Store_product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store_category;
use Cart;

class StoreController extends Controller
{
    public function index()
    {
        $aCategories = Store_category::whereHas('products', function ($q) {
            $q->where('status', 1);
        })
            ->where('status', 1)
            ->orderBy('pos', 'asc')
            ->orderBy('id', 'asc')
            ->get();
//        $aCategory = Store_category::where('slug', $aCategories[0]->slug)->first();
//        $aCategory = $aCategories->first();
        $aProducts = $aCategories->first()->products()
            ->where('status', 1)
            ->paginate(6);
        $aHighCategory = Store_category::has('products')->where('slug', 'destacado')->first();
        $aHighlights = array();
        if ($aHighCategory) {
            $aHighlights = $aHighCategory->products()
                ->where('status', 1)
                ->orderBy('pivot_pos', 'asc')
                ->orderBy('pivot_created_at', 'asc')
                ->take(3)
                ->get();
        }
        $slug = $aCategories->first()->slug;
        $sTitle = $aCategories->first()->name;
        $iSubTotal = 0;
        foreach (Cart::content() as $item) {
            $iSubTotal += $item->options->price_before;
        }
        return view('public.index', compact('aCategories', 'aProducts', 'slug', 'sTitle', 'aHighlights', 'iSubTotal'));
    }

    public function getMenuProducts($slug)
    {
        $aCategories = Store_category::whereHas('products', function ($q) {
            $q->where('status', 1);
        })
            ->where('status', 1)
            ->orderBy('pos', 'asc')
            ->orderBy('id', 'asc')
            ->get();
        $aCategory = Store_category::where('slug', $slug)->firstOrFail();
        $aProducts = $aCategory->products()
            ->where('status', 1)
            ->paginate(6);
        $aHighCategory = Store_category::has('products')->where('slug', 'destacado')->first();
        $sTitle = $aCategory->name;
        $aHighlights = array();
        if ($aHighCategory) {
            $aHighlights = $aHighCategory->products()
                ->where('status', 1)
                ->orderBy('pivot_pos', 'asc')
                ->orderBy('pivot_created_at', 'asc')
                ->take(3)
                ->get();
        }
        $iSubTotal = 0;
        foreach (Cart::content() as $item) {
            $iSubTotal += $item->options->price_before;
        }
        return view('public.index', compact('aCategories', 'aProducts', 'slug', 'sTitle', 'aHighlights', 'iSubTotal'));
    }
}
