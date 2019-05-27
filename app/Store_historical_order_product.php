<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_historical_order_product extends Model
{
    protected $table = 'store_historical_order_products';
    protected $fillable = ['id', 'qty', 'name', 'description', 'extract', 'price', 'price_before', 'image', 'status',
        'order_id', 'created_at'];

    public function storeOrder(){
        return $this->belongsTo(Store_order::class, 'order_id');
    }


}
