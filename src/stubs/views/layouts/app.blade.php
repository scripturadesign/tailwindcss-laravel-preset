<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex h-screen font-sans antialiased text-black leading-tight bg-grey-lighter">
<div id="app" class="flex-1 block md:flex flex-col">
    <nav class="flex items-center justify-between flex-wrap shadow-md bg-teal px-2 py-4">
        <a href="#" class="flex items-center flex-no-shrink text-white no-underline mr-4 px-2 rounded focus:outline-none focus:shadow-outline">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
            <span class="font-semibold text-xl tracking-tight">Larawind</span>
        </a>
        <div class="block md:hidden">
            <button onclick="document.querySelector('[data-navbar-content]').classList.toggle('hidden')" class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white rounded focus:outline-none focus:shadow-outline">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div data-navbar-content class="w-full block flex-grow md:flex md:items-center md:w-auto hidden md:block">
            <div class="text-sm md:flex-grow">
                <a href="#responsive-header" class="block px-1 py-2 mt-2 md:inline-block md:mt-0 text-teal-lighter hover:text-white no-underline mr-4 rounded focus:outline-none focus:shadow-outline">
                    Docs
                </a>
                <a href="#responsive-header" class="block px-1 py-2 mt-2 md:inline-block md:mt-0 text-teal-lighter hover:text-white no-underline mr-4 rounded focus:outline-none focus:shadow-outline">
                    Examples
                </a>
                <a href="#responsive-header" class="block px-1 py-2 mt-2 md:inline-block md:mt-0 text-teal-lighter hover:text-white no-underline rounded focus:outline-none focus:shadow-outline">
                    Blog
                </a>
            </div>
            <div class="text-sm">
                @guest
                    <a href="{{ route('login') }}" class="block px-1 py-2 mt-2 md:inline-block md:mt-0 text-teal-lighter hover:text-white no-underline mr-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}" class="block px-1 py-2 mt-2 md:inline-block md:mt-0 text-teal-lighter hover:text-white no-underline mr-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Register') }}
                    </a>
                @else
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="block px-1 py-2 mt-2 md:inline-block md:mt-0 text-teal-lighter hover:text-white no-underline mr-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Logout') }}
                    </a>
                    <a href="#" class="block px-1 py-2 mt-2 md:inline-block md:mt-0 text-teal-lighter hover:text-white no-underline mr-4 rounded focus:outline-none focus:shadow-outline">
                        {{ Auth::user()->name ?? __('You Know Who') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </nav>
    <div class="flex-1 flex flex-col pb-4">
        @yield('body')
    </div>
    <div class="fixed pin-b pin-r mr-3 mb-3 text-xs text-grey">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
    </div>
</div>
</body>
</html>
