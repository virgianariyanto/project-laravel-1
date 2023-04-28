@extends('dashboard.layouts.main_dashboard')

@section('container')
    <h1 class="text-2xl font-semibold">{{ $post->title }}</h1>
    <article class="">
        <p class="text-sm text-slate-600 my-3">
            By. <a href="\posts?author={{ $post->author->username }}" class="text-blue-500">{{ $post->author->name }}</a> In <a href="\posts?category={{ $post->category->slug }}" class="text-blue-500">{{ $post->category->name }}</a>
        </p>
        <img src="{{ asset('storage/' . $post->image) }}" alt="">      
        <p>{{ $post->body }}</p>
    </article>
    <div class="my-4">
        <a href="/dashboard/posts" class="text-blue-500 underline text-sm">Back to posts</a>
    </div>
@endsection