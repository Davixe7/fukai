<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_town extends Model
{
    protected $table = 'delivery_towns';
    protected $fillable = ['id', 'name', 'city','status','created_at'];

    public function addresses(){
        return $this->hasMany(User_address::class, 'delivery_town_id');
    }
    public function offices(){
        return $this->hasMany(Delivery_office::class, 'delivery_town_id');
    }
}
