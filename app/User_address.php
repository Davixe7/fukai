<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\ShedulerTrait;


class User_address extends Model
{
    use ShedulerTrait;
    protected $table = 'user_addresses';
    protected $fillable = ['address', 'address_coords', 'comment', 'user_id', 'delivery_town_id', 'created_at'];

    public function town()
    {
        return $this->belongsTo(Delivery_town::class, 'delivery_town_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCheckOfficeOpenAttribute()
    {
        return ($this->scheduler_active($this->town->offices()->first()->scheduler_code)) ? '' : '(Local cerrado)';
    }

    function distance($pCoords)
    {
        if (strpos($this->address_coords,',') !== false){
            $aPoint1 = explode(',', $pCoords);
            $aPont2 = explode(',', $this->address_coords);
            $lat1 = $aPoint1[0];
            $lon1 = $aPoint1[1];
            $lat2 = $aPont2[0];
            $lon2 = $aPont2[1];
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $kilometers = $miles * 1.609344;
            $meters = $kilometers * 1000;
            return $meters;
        }else{
            return false;
        }
    }
}
