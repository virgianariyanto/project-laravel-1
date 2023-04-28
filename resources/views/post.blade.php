
@extends('layouts.main')

@section('container')
    <div class="w-full flex justify-center">
        <div class="w-5/6">
            <h1 class="text-2xl font-semibold">{{ $post->title }}</h1>
            <article class="">
                <p class="text-sm text-slate-600 my-3">
                    By. <a href="/posts?author={{ $post->author->username }}" class="text-blue-500">{{ $post->author->name }}</a> In <a href="\posts?category={{ $post->category->slug }}" class="text-blue-500">{{ $post->category->name }}</a>
                </p>
                <img src="{{ asset('storage/' . $post->image) }}" alt="">      
                <p>{{ $post->body }}</p>
            </article>    
        </div>
    </div>
@endsection