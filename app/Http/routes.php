<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::bind('product', function($slug){
    return App\Store_product::where('slug', $slug)->first();
});
Route::get('/home', ['as'=>'index','uses'=>'StoreController@index']);

Route::get('/', function(Request $request){
    return view('public.landing');
});

Route::get('menu/{slug}', ['as'=>'menu.product','uses'=>'StoreController@getMenuProducts']);
Route::get('nosotros', ['as'=>'nosotros', 'uses'=>'PublicController@getNosotros']);
Route::get('restaurantes', ['as'=>'restaurant', 'uses'=>'PublicController@getRestaurantes']);
Route::get('carta/{product}', ['as'=>'carta.product', 'uses' => 'PublicController@getProduct']);

//-------------GET IMG ---------------
Route::get('producto/img/{image?}', ['as'=>'get.image', 'uses'=>'PublicController@getImage']);

//------------ Cart Controller -------------
Route::get('add/{product}/{ruta?}', ['as'=>'add', 'uses'=>'CartController@getAdd']);
Route::get('vaciar-carrito', ['as'=>'destroy', 'uses'=>'CartController@getDestroy']);
Route::get('eliminar/{rowId}/{ruta?}', ['as'=>'delete', 'uses'=>'CartController@getDelete']);
Route::get('actualizar/{rowId}/{ruta?}', ['as'=>'update', 'uses'=>'CartController@getUpdate']);

//-------------required Auth ----------------
Route::group(['middleware' => 'auth'], function () {
    Route::post('orden/compra', ['as' => 'order.create', 'uses' => 'PurchaseOrderController@postOrder']);
    Route::get('mis-compras', ['as'=>'my.purchases', 'uses' => 'PurchaseOrderController@getMyOrders']);
    Route::get('voucher/{nro}', ['as'=>'voucher', 'uses' => 'PurchaseOrderController@getVoucher']);
    Route::get('detalle-del-pedido',['as'=>'purchase.order', 'uses' => 'PurchaseOrderController@getPurchaseOrder']);
    Route::get('repetir/{sOrder}',['as'=>'repeat.order','uses'=>'PurchaseOrderController@getRepeatOrder']);
    Route::get('usuario', ['as'=>'user.perfil', 'uses' => 'UserController@getPerfil']);
    Route::get('direcciones', ['as'=>'user.addresses', 'uses' => 'UserController@getAddress']);
    Route::put('usuario', ['as'=>'user.information', 'uses' => 'UserController@putInformation']);
    Route::put('usuario/contraseña', ['as'=>'user.change.password', 'uses' => 'UserController@putChangePass']);
    Route::post('usuario/direccion', ['as'=>'user.address', 'uses' => 'UserController@postCreateAddress']);
    Route::get('usuario/direccion/{id}', ['as'=>'user.address.delete', 'uses' => 'UserController@getDeleteAddress']);
});

//------------ AUTH CONTROLLER -------------
Route::get('logout', ['as' => 'logout','uses' => 'Auth\SitcoAuthController@logout']);
Route::post('iniciar-sesion', ['as' => 'login','uses' => 'Auth\SitcoAuthController@login']);
Route::post('registar', ['as' => 'register','uses' => 'Auth\SitcoAuthController@postRegister']);

//----------St admin controller -------
Route::resource('stadmin-product', 'SitcoAdmin\ProductController');
Route::resource('stadmin-post', 'SitcoAdmin\PostController');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', ['as' => 'recover.pass', 'uses' => 'Auth\PasswordController@postEmail']);
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'reset.pass', 'uses' => 'Auth\PasswordController@postReset']);
Route::get('test',['as' => 'test', function(){
    Cart::content()->reverse();
    dd(Cart::content());
}]);
//--------- CONTACT -----------
Route::post('contacto', ['as' => 'postContact','uses' => 'ContactController@contactAjax']);

Route::post('mail/send-orderstatus', ['as' => 'send.orderstatus', 'uses' => 'MailController@postSendOrderStatus']);

//........API...........
Route::get('v1/getItem','SitcoAdmin\ApiController@getItem');

// Route::get('/time', function(){
//     echo date('N');
// });