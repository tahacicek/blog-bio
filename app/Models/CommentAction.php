<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentAction extends Model
{
    use HasFactory;

    protected $table = 'comment_actions';

    protected $fillable = [
        'user_id',
        'comment_id',
        'type',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function comment(){
        return $this->belongsTo('App\Models\Comment');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }
}
