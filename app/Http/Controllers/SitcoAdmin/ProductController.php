<?php

namespace App\Http\Controllers\SitcoAdmin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store_product;
use Storage;
use Response;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:200',
            'extract' => 'max:160',
            'price' => 'numeric',
            'price_before' => 'numeric',
            'discount' => 'numeric',
            'image' => 'mimes:jpeg,gif,png',
        ];
        if ($response = $this->validatorResponse($request->all(), $rules)) {
            return $response;
        }
        $imgName = '';
        if ($request->file('image')) {
            $aType = explode('/', $request->file('image')->getMimeType());
            $imgName = uniqid() . '.' . $aType[1];
            Storage::put('product/' . $imgName,
                file_get_contents($request->file('image')->getRealPath()));
        }
        $aProduct = Store_product::create([
            'name' => $request->name,
            'slug' => str_slug($request->name, '-'),
            'description' => $request->description,
            'extract' => $request->extract,
            'price' => $request->price,
            'price_before' => $request->price_before,
            'discount' => $request->discount,
            'image' => $imgName,
        ]);
        $aProduct->categories()->attach($request->store_category_id);
        return Response::json(array([
            'response' => 'Producto creado correctamente'
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $rules = [
            'name' => 'required|max:200',
            'extract' => 'max:160',
            'price' => 'numeric',
            'price_before' => 'numeric',
            'discount' => 'numeric',
            'image' => 'mimes:jpeg,gif,png',
        ];
        if ($response = $this->validatorResponse($request->all(), $rules)) {
            return $response;
        }

        $aProduct = Store_product::find($id); //buscar registro producto
        $imgName = $aProduct->image; //guardar nombre actual de image
        if ($request->file('image')) { //si subieron una image
            $aType = explode('/', $request->file('image')->getMimeType());
            $imgName = uniqid() . '.' . $aType[1]; //usar nombre nuevo para image
            Storage::put('product/' . $imgName,
                file_get_contents($request->file('image')->getRealPath())); //guardar imagen nueva
            if (Storage::has('product/'.$aProduct->image) && strlen($aProduct->image)>4) {//si existe imagen actual fisicamente
                Storage::delete('product/'.$aProduct->image); //borrarla
            }
        }
        $aProduct->image = $imgName; //actualizar registro con nombre nuevo o actual de imagen
        $aProduct->name = $request->name;
        $aProduct->slug = str_slug($request->name, '-');
        $aProduct->description = $request->description;
        $aProduct->extract = $request->extract;
        $aProduct->price = $request->price;
        $aProduct->price_before = $request->price_before;
        $aProduct->discount = $request->discount;
        $aProduct->save();

        $aProduct->categories()->sync($request->store_category_id);

        return Response::json(array([
            'response' => 'Producto editado correctamente'
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aId = array('id' => $id);
        $rules = [
            'id' => 'exists:store_products,id',
        ];
        if ($response = $this->validatorResponse($aId, $rules)) {
            return $response;
        }
        $aProduct = Store_product::find($id);
//        dd($aProduct);
        if ($aProduct->image) {
            Storage::delete('product/' . $aProduct->image);
        }
        $aProduct->delete();
        return Response::json(array([
            'response' => '¡Producto borrado exitosamente!'
        ]));
    }

    protected function validatorResponse($request, $rules)
    {
        $validator = Validator::make($request, $rules);

        if ($validator->fails()) {
            return Response::json(array(
                    'error' => true,
                    'errors' => $validator->getMessageBag()->toArray())
            );
        }
        return false;
    }
}
