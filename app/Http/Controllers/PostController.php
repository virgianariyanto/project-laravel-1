<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in '. $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by '. $author->name;
        }

        return view('posts', [
            'title' => "All Posts",
            'heading' => 'All Posts' . $title,
            // 'posts' => Post::all()
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString()

        ]);
    }

    public function show(Post $post) 
    {
        return view('post', [
            'title' => 'Single Post',
            'post' => $post
        ]);
    }
}
