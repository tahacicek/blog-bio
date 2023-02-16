<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'action',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //like count
    public function likeCountPost($id)
    {
        return $this->where('action', 'like')->where('post_id', $id)->count();
    }

    //dislike count
    public function dislikeCountPost($id)
    {
        return $this->where('action', 'dislike')->where('post_id', $id)->count();
    }

    //read count
    public function readCountPost($id)
    {
        return $this->where('read_status', 'read')->where('post_id', $id)->count();
    }

    //bookmark_url count
    public function bookmarkUrlCountPost($id)
    {
        return $this->where('bookmark_url', '!=', null)->where('post_id', $id)->count();
    }

}
