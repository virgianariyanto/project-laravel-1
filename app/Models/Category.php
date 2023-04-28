<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    public function totalPosts()
    // nama method harus sama dengan nama pada route category
    {
        return $this->hasMany(Post::class);
    }
}
