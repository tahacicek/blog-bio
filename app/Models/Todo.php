<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'color',
        'deadline',
        'status',
        'user_id',
        'project_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    //acitve count
    public function activeCount($id)
    {
        if($this->where('status', 'active')->where('project_id', $id)->count() == null)
            return 1;
        else
            return $this->where('status', 'active')->where('project_id', $id)->count();
    }

    //completed count
    public function starCount($id)
    {
        if($this->where('status', 'star')->where('project_id', $id)->count() == null)
            return 1;
        else
        return $this->where('status', 'star')->where('project_id', $id)->count();
    }

    //pending count
    public function completedCount($id)
    {
        if($this->where('status', 'completed')->where('project_id', $id)->count() == null)
            return 1;
        else
        return $this->where('status', 'completed')->where('project_id', $id)->count();
    }
}
