<?php

namespace App;

class Post extends Model
{
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user() //$post->user
    {
    	return $this->belongsTo(User::class);
    }
}
