<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $with = ['category', 'author'];
    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
                })
                ->orWhere('title', 'frontend');
        });

        $query->when($filter['categories'] ?? false, function ($query, $slug) {
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });

        $query->when($filter['users'] ?? false, function ($query, $username) {
            $query->whereHas('author', function ($query) use ($username) {
                $query->where('username', $username);
            });
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscriber()
    {
        return $this->belongsToMany(User::class);
    }

    public function unSubscribed(){
        return $this->subscriber()->detach(auth()->id());
    }

    public function subscribed() {
        return $this->subscriber()->attach(auth()->id());
    }
}
