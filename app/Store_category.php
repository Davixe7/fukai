<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_category extends Model
{
    protected $table = 'store_categories';
    protected $fillable = ['id', 'name', 'slug', 'status', 'created_at'];

    public function products()
    {
        return $this->belongsToMany(Store_product::class, 'store_category_product', 'category_id', 'product_id')
            ->withPivot('pos','created_at');
    }
}
