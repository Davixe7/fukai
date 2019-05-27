<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_product extends Model
{
    protected $table = 'store_products';

    protected $fillable = ['id', 'name', 'slug', 'description', 'extract', 'price', 'price_before', 'discount', 'image',
        'status', 'created_at'];

    public function categories(){
        return $this->belongsToMany(Store_category::class,'store_category_product','product_id','category_id')->withPivot('pos');
    }
    public function orders(){
        return $this->belongsToMany(Store_order::class,'store_order_product','product_id','	order_id');
    }
}
