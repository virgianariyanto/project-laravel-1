@extends('layouts.main')

@section('container')
@if(session()->has('success'))
    {{ session('success') }}
@endif

@if(session()->has('loginFailed'))
    {{ session('loginFailed') }}
@endif

    <div id="login" class="w-full flex justify-center">
        <form action="/login" method="post" class="w-[23%] bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
                </label>
                <input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username" autofocus required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
                </label>
                <input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Sign In
                </button>
                <p class="text-sm">Not registered? <button type="button" class="text-sm underline text-blue-500 hover:text-blue-800" id="link">
                Register</button></p>
            </div>
            <p class="text-center text-gray-500 text-xs mt-4">
                &copy;2020 Acme Corp. All rights reserved.
            </p>
        </form>
    </div>

    <div id="register" class="w-full flex justify-center hidden">
        <form action="/register" method="post" class="w-[30%] bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
                </label>
                <input class="@error('name') border-red-500 @enderror shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="..." value="{{ old('name') }}" >
                @error('name') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
                </label>
                <input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="..." value="{{ old('username') }}">
                @error('username') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
                </label>
                <input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="example@abc.com" value="{{ old('email') }}">
                @error('email') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
                </label>
                <input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************">
                @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Register
                </button>
                <p class="text-sm">Already registered? <button type="button" id="link2" class="text-sm underline text-blue-500 hover:text-blue-800">
                Login</button></p>
            </div>
            <p class="text-center text-gray-500 text-xs mt-4">
                &copy;2020 Acme Corp. All rights reserved.
            </p>
        </form>
    </div>
<script>
    const link = document.querySelector('#link')
    const link2 = document.querySelector('#link2')
    const register = document.querySelector('#register')
    const login = document.querySelector('#login')

    link.addEventListener('click', function(){
        register.classList.remove('hidden');
        login.classList.add('hidden');
    });

    link2.addEventListener('click', function(){
        login.classList.remove('hidden')
        register.classList.add('hidden')
    });
</script>

@endsection