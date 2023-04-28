@extends('layouts.main')

@section('container')
    <div class="w-full flex flex-wrap justify-center container">
        <form action="/posts" class="w-5/6 flex inline-flex justify-center">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <input type="text" name="search" class="w-1/2 bg-slate-100 appearance-none rounded py-2 px-4 text-gray-700 focus:bg-slate-50 focus:border-blue-500" value="{{ request('search') }}" />
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                </svg>
            </button>
        </form>

        <div class="w-5/6 mt-8">
            <h1 class="text-4xl font-semibold">{{ $heading }}</h1>
            @if ($posts->count())
                @foreach ($posts as $post)
                    <article class="my-10">
                        <a href="\posts\{{ $post->slug }}" class="text-red-500">
                            <h3 class="font-semibold text-lg">{{ $post->title }}</h3>
                        </a>
                        <p>
                            <h6>By. <a href="\posts?author={{ $post->author->username }}" class="text-blue-500">{{ $post->author->name }}</a> in <a href="\posts?category={{ $post->category->slug }}" class="text-blue-500">{{ $post->category->name }}</a></h6>
                            <h6><a href=""></a></h6>
                            {{-- link tujuan harus sesuai dengan apa yg ditulis di Route --}}
                        </p>
                        <p>{{ $post->excerpt }}</p>
                    </article>    
                @endforeach
            @else
            <h1>Tidak ada Posts</h1>
            @endif
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection    