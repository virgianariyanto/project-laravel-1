<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;


class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters) 
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use($search) {
                   $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('excerpt', 'like', '%' . $search . '%')
                         ->orWhere('body', 'like', '%' . $search . '%');
            }); 
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author) {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });


    }

    public function category()
    // nama function harus sama dengan nama model tujuan
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    // nama function harus sama dengan nama model tujuan
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
