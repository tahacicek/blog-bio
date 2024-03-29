<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    //post actions
    public function postActions()
    {
        return $this->hasMany(PostAction::class, 'user_id', 'id');
    }

    //comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    //comment actions
    public function commentActions()
    {
        return $this->hasMany(CommentAction::class, 'user_id', 'id');
    }

    //parent comments
    public function parentComments()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

}
