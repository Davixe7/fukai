<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\ShedulerTrait;


class Delivery_office extends Model
{
    use ShedulerTrait;
    protected $table = 'delivery_offices';
    protected $fillable = ['name', 'address', 'email','phone','service_hours','scheduler_code','delivery_price','delivery_town_id'];
    public function town()
    {
        return $this->belongsTo(Delivery_town::class, 'delivery_town_id');
    }
    public function deliveryOrders()
    {
        return $this->hasMany(Delivery_order::class, 'delivery_office_id');
    }
    public function getCheckOfficeOpenAttribute(){
        return ($this->scheduler_active($this->scheduler_code))? '':'(Local cerrado)';
    }
}
