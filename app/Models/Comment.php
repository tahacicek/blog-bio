<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //parent_id olanlar
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    //comment_action
    public function commentAction()
    {
        return $this->hasOne(CommentAction::class);
    }

    //parent action
    public function parentComments()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

}
