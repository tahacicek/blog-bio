<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'user_id',
        'post_id',
        'name',
        'slug',
        'count'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    //user

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
