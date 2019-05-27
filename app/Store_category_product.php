<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_category_product extends Model
{
    protected $table = 'store_category_product';
    protected $fillable = ['id', 'pos', 'category_id', 'product_id', 'created_at'];
}
