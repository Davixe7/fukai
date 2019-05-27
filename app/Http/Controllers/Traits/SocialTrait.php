<?php

namespace App\Http\Controllers\Traits;

use App\User;
use App\User_data;

trait SocialTrait
{
    protected function create(array $data)
    {
        $aUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        User_data::create([
            'phone' => $data['phone'],
            'user_id' => $aUser->id
        ]);
        return $aUser;
    }
}
