<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation with commetns
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    // Search filter
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('summary', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        
    }
}
