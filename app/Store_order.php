<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_order extends Model
{
    protected $table = 'store_orders';

    protected $fillable = ['id', 'purchase_code', 'amount', 'amount_before', 'status', 'user_id', 'price', 'created_at'];

    public function products()
    {
        return $this->belongsToMany(Store_product::class, 'store_order_product', 'order_id', 'product_id')->withPivot('qty');;
    }

    public function historicalOrderProduct()
    {
        return $this->hasMany(Store_historical_order_product::class, 'order_id');
    }

    public function deliveryOrder()
    {
        return $this->hasOne(Delivery_order::class, 'store_order_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
