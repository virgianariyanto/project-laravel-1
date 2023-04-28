<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use function Ramsey\Uuid\v1;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.index');
    }

    // public function dashboardPosts()
    // {
    //     return view('dashboard.dashboard_posts', [
    //         'posts' => Post::where('user_id', auth()->user()->id)->get()
    //     ]);
    // }

    // public function insertPost(Request $request)
    // {
    //     return $request;
    // }

    // public function createPost()
    // {
    //     return view('dashboard.manage_posts', [
    //         'category' => Category::all(),
    //     ]);
    // }

    // public function editPost(Post $edit_post)
    // {
    //     return view('dashboard.edit_post', [
    //         'post' => $edit_post
    //     ]);
    // }

    // public function dashboardUsers()
    // {
    //     return view('dashboard.dashboard_users', [
    //         'authors' => User::all()
    //     ]);
    // }
}
