<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_order extends Model
{
    protected $table = 'delivery_orders';
    protected $fillable = ['id', 'code', 'delivery_place', 'full_address', 'customer_comments', 'operator_comments', 'delivery_time',
        'payment', 'cash', 'stage', 'store_order_id', 'delivery_operator', 'delivery_office_id', 'created_at'];

    public function storeOrder()
    {
        return $this->belongsTo(Store_order::class, 'store_order_id');
    }
    public function deliveryOffice()
    {
        return $this->belongsTo(Delivery_office::class, 'delivery_office_id');
    }
}
