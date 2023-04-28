@extends('layouts.main')

@section('container')
    <div class="w-full flex flex-wrap justify-center container">
        <div class="w-5/6 flex inline-flex justify-center">
            <input type="text" name="search" class="w-1/2 bg-slate-50 appearance-none border-2 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-slate-50 focus:border-blue-500" value="" />
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                </svg>
            </button>
        </div>

        <div class="w-5/6 mt-8">
            <h1 class="text-4xl font-semibold">All Category</h1>
            <div class="mt-10">
                @foreach ($category as $cat )
                <a href="\categories\{{ $cat->slug }}" class="text-blue-500">
                    <p class="my-3">{{ $cat->name }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection    