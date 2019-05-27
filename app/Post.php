<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['id', 'slug', 'title', 'description', 'author', 'email', 'embed', 'metadata', 'image', 'link',
        'pubdate', 'status', 'postclass_id', 'created_at'];

    public function postClass()
    {
        return $this->belongsTo(Postclass::class, 'postclass_id');
    }
}
