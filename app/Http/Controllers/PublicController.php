<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store_category;
use App\Store_product;
use Storage;
use Response;

class PublicController extends Controller
{
    public function getNosotros()
    {
        $aCategories = Store_category::where('status', 1)->orderBy('pos', 'asc')->orderBy('id', 'asc')->get();
        $slug = '';
        return view('public.nosotros', compact('aCategories', 'slug'));
    }

    public function getRestaurantes()
    {
        $aCategories = Store_category::where('status', 1)->orderBy('pos', 'asc')->orderBy('id', 'asc')->get();
        $slug = '';
        return view('public.restaurantes', compact('aCategories', 'slug'));
    }

    public function getProduct(Store_product $product)
    {
        $aCategories = Store_category::whereHas('products', function ($q) {
            $q->where('status', 1);
        })->where('status', 1)->orderBy('pos', 'asc')->orderBy('id', 'asc')->get();
        $aHighCategory = Store_category::has('products')->where('slug', 'destacado')->first();
        $aHighlights = array();
        if ($aHighCategory){
            $aHighlights = $aHighCategory->products()
                ->where('status', 1)
                ->orderBy('pivot_pos', 'asc')
                ->orderBy('pivot_created_at', 'asc')
                ->take(3)
                ->get();
        }
        $slug = '';
        return view('public.producto', compact('aCategories', 'slug', 'product','aHighlights'));
    }

    public function getImage($image = '')
    {
        $exists = Storage::has('product/' . $image);
        if (!$exists || empty($image)) {
            $file = Storage::get('default-image.png');
            $type = Storage::mimeType('default-image.png');
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);
            return $response;
        }

        $file = Storage::get('product/' . $image);
        $type = Storage::mimeType('product/' . $image);
        $path = storage_path('app/product/' . $image);


        switch ($type) {
            case 'image/jpeg':
                $im = @imagecreatefromjpeg($path);
                break;
            case 'image/png':
                $im = @imagecreatefrompng($path);
                break;
            case 'image/gif':
                $im = @imagecreatefromgif($path);
                break;
        }

        $im = imagescale($im, 800);
        $compress = 75;
        header('Content-Type: image/jpeg');
        imagejpeg($im, NULL, $compress);
        imagedestroy($im);
        // $response = Response::make($file, 200);
        // $response->header("Content-Type",$type);
        // return $response;
    }


    /*public function getImage($name, $newWidth=0){
      $file = Storage::get('Selfie/'.$name);
      $type = Storage::mimeType('Selfie/'.$name);
      $path = storage_path('app/Selfie/'.$name);
      list($width, $height) = getimagesize($path);
      //comprimir a jpg
      switch ($type) {
        case 'image/jpeg':
          $im = @imagecreatefromjpeg($path);
        break;
        case 'image/png':
          $im = @imagecreatefrompng($path);
        break;
        case 'image/gif':
          $im = @imagecreatefromgif($path);
        break;
      }
      $compress = 70;
      if ($newWidth>0) {
        if ($height > 240 && $width > 240) {
          if ($height > $width) {
            $newHeight = $newWidth;
            if ($height >= 400 || $newHeight > 400 ) $newHeight = 400;
            $ratio = $width/$height;
            $newWidth = $ratio * $newHeight;
            $tmp = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($tmp, $im, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            $compress = 100;
            $im = $tmp;
          } else {
            $ratio = $height/$width;
            $newHeight = $ratio * $newWidth;
            $tmp = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($tmp, $im, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            $compress = 70;
            $im = $tmp;
          }
        }
      }

      header('Content-Type: image/jpeg');
      imagejpeg($im, NULL, $compress);
      imagedestroy($im);
    }*/
}
