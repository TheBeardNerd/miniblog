<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'post', 'owner_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($comment)
    {
        $this->comments()->create($comment);
    }
}
