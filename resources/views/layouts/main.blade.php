<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

    <title>{{ $title }}</title>
</head>
<body>
    <nav class="bg-slate-500 h-16 w-full flex justify-center">
        <div class="w-5/6 flex justify-between">
            <div class="flex items-center">
                <span class="text-2xl font-semibold text-white">Project</span>
            </div>
            <div class="flex items-center">
                <ul class="flex">
                    <li class="px-3"><a href="/" class="{{ $title === 'Home Page' ? 'text-slate-100' : '' }}">Home</a></li>
                    <li class="px-3"><a href="/about" class="{{ $title === 'About Page' ? 'text-slate-100' : '' }}">About</a></li>
                    <li class="px-3"><a href="/posts" class="{{ $title === 'Category Page' || $title === 'All Posts' || $title === 'Author Page' ? 'text-slate-100' : '' }}">Blog</a></li>
                    @auth
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">{{ auth()->user()->name }} <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                  <li>
                                    <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                  </li>
                                  <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                  </li>
                                </ul>
                                <div class="py-1 w-full">
                                    <form action="/logout" method="post" class="hover:bg-gray-100">
                                        @csrf  
                                        <button type="submit" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="px-3"><a href="/login" class="{{ $title === 'Login Page' ? 'text-slate-100' : '' }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-10">
        @yield('container')
    </div>
</body>
</html>