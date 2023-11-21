<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>NayaPay</title>
</head>

<body>

    <header class="md:mx-40">
        <nav class="nav-bar flex flex-wrap items-center justify-between p-5" id="nav">
            <img src="./image/logo.png" alt="" width="200px">
            <div class="flex md:hidden">
                <button id="hamburger">
                    <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png"
                        width="40" height="40" />
                    <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png"
                        width="40" height="40" />
                </button>
            </div>
            <style>
                .active {
                    border-bottom: 2px solid rgb(249, 120, 0);
                }
            </style>
            <div
                class="toggle bg-orange-600 md:bg-transparent bg-opacity-80 rounded-lg md:rounded-none hidden w-full md:w-auto md:flex text-center text-bold mt-5 md:mt-0 border-t-2 border-none">
                <a href="/"
                    class="active block md:inline-block md:text-black md:bg-transparent bg-orange-600 text-white hover:text-orange-500 px-3 py-3 border-b-2 md:border-orange-500 font-bold border-none">Home</a>
                <a href="{{ route('future') }}"
                    class="block md:inline-block md:text-black md:bg-transparent bg-orange-600 text-white hover:text-orange-500 px-3 py-3 border-b-2 md:border-orange-500 font-bold border-none">Future</a>
                <a href="{{ route('price') }}"
                    class="block md:inline-block md:text-black text-white hover:text-orange-500 px-3 py-3 border-b-2 border-none font-bold">Pricing</a>
                <a href="{{ route('contect') }}"
                    class="block md:inline-block md:text-black text-white hover:text-orange-500 px-3 py-3 border-b-2 border-none font-bold">Contact</a>

                @guest
                    <a href="{{ route('login') }}"
                        class="block md:inline-block md:text-black text-white hover:text-orange-500 px-3 py-3 border-b-2 border-none font-bold">Login</a>

                </div>
                <a href="{{ route('register') }}"
                    class="toggle hidden md:flex w-full md:w-auto px-4 py-2 text-center bg-orange-500  hover:bg-orange-600 text-white md:mt-0 mt-5 rounded-lg">Create
                    Account</a>
            @endguest

            @auth
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>

                </div>
                <a href="{{ route('dashboard') }}"
                    class="toggle hidden md:flex w-full md:w-auto px-4 py-2 text-center bg-orange-500  hover:bg-orange-600 text-white md:mt-0 mt-5 rounded-lg">Dashboard</a>
            @endauth

        </nav>
        </nav>

    </header>


    @yield('main')

</body>

</html>
