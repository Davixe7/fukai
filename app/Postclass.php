<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postclass extends Model
{
    protected $table = 'postclasses';
    protected $fillable = ['id', 'slug', 'name', 'status', 'template_id', 'created_at'];

    public function posts(){
        return $this->hasMany(Post::class, 'postclass_id');
    }
}
