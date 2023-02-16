<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts', 'id', 'id');
    }

    //post action
    public function postAction()
    {
        return $this->hasMany(PostAction::class);
    }
}
