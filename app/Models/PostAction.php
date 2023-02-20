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

    //report_reason count
    public function reportReasonCountPost($id)
    {
        return $this->where('report_reason', '!=', null)->where('post_id', $id)->count();
    }

    //reblog count

    public function reblogCountPost($id)
    {
        return $this->where('post_id', $id)->sum('reblog_count');
    }

    //beğenenler
    public function likeUsers($id)
    {
        return $this->where('action', 'like')->where('post_id', $id)->get();
    }

    //beğenmeyenler

    public function dislikeUsers($id)
    {
        return $this->where('action', 'dislike')->where('post_id', $id)->get();
    }

    //okuyanlar

    public function readUsers($id)
    {
        return $this->where('read_status', 'read')->where('post_id', $id)->get();
    }

    //yorum yapanlar

    public function commentUsers($id)
    {
        return $this->where('post_id', $id)->get();
    }

    //reblog yapanlar

    public function reblogUsers($id)
    {
        return $this->where('reblog', '!=', null)->where('post_id', $id)->get();
    }

    //bookmark_url yapanlar

    public function bookmarkUrlUsers($id)
    {
        return $this->where('bookmark_url', '!=', null)->where('post_id', $id)->get();
    }

    //report_reason yapanlar

    public function reportReasonUsers($id)
    {
        return $this->where('report_reason', '!=', null)->where('post_id', $id)->get();
    }



}
