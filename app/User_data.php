<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_data extends Model
{
    protected $table = 'user_datas';
    protected $fillable = ['birthdate', 'phone', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
