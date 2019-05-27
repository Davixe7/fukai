<?php

namespace App\Http\Controllers\SitcoAdmin;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
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
            'title' => 'required|max:200',
            'description' => 'max:255',
            'author' => 'max:255',
            'email' => 'email|max:255',
            'embed' => 'max:255',
            'metadata' => 'max:255',
            'image' => 'mimes:jpeg,gif,png',
            'link' => 'max:255',
            'pubdate' => 'max:255',
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
        $aProduct = Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->title, '-'),
            'description' => $request->description,
            'author' => $request->author,
            'email' => $request->email,
            'embed' => $request->embed,
            'metadata' => $request->metadata,
            'image' => $imgName,
            'link' => $request->link,
            'pubdate' => $request->pubdate,
        ]);
        $aProduct->categories()->attach($request->store_category_id);
        return Response::json(array([
            'response' => 'Post creado correctamente'
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
        $rules = [
            'title' => 'required|max:200',
            'description' => 'max:255',
            'author' => 'max:255',
            'email' => 'email|max:255',
            'embed' => 'max:255',
            'metadata' => 'max:255',
            'image' => 'mimes:jpeg,gif,png',
            'link' => 'max:255',
            'pubdate' => 'max:255',
        ];
        if ($response = $this->validatorResponse($request->all(), $rules)) {
            return $response;
        }
        $imgName = '';
        if ($request->file('image')) {
            $aType = explode('/', $request->file('image')->getMimeType());
            $imgName = uniqid() . '.' . $aType[1];
        }
        $aPost = Post::find($id);
        if ($aPost->image) {
            Storage::delete('product/' . $aPost->image);
        }
        Storage::put('product/' . $imgName,
            file_get_contents($request->file('image')->getRealPath()));
        $aPost->title = $request->title;
        $aPost->slug = str_slug($request->title, '-');
        $aPost->description = $request->description;
        $aPost->author = $request->author;
        $aPost->email = $request->email;
        $aPost->embed = $request->embed;
        $aPost->metadata = $request->metadata;
        $aPost->image = $imgName;
        $aPost->link = $request->link;
        $aPost->pubdate = $$request->link;
        $aPost->save();

        $aPost->categories()->sync($request->store_category_id);

        return Response::json(array([
            'response' => 'Post editado correctamente'
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
        $aPost = Post::find($id);
//        dd($aProduct);
        if ($aPost->image) {
            Storage::delete('product/' . $aPost->image);
        }
        $aPost->delete();
        return Response::json(array([
            'response' => '¡Post borrado exitosamente!'
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
