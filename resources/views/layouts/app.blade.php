<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', "Nadia's Garden Restaurant") }} @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

</head>
<body>
        <div id="app" class="container">
            <div class="top-bar">
                <div>Call us at (123) 456-7891</div>
                <div>
                    <a href="/location#directions">get driving directions</a>
                </div>
            </div>
            <header>
                <a href="/">
                    <img src="/images/logo.png" alt="">
                </a>
                <nav>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li class="separator"></li>
                        <li><a href="/about">About</a></li>
                        <li class="separator"></li>
                        <li><a href="/menu">Menu</a></li>
                        <li class="separator"></li>
                        <li><a href="/reservations">Reservations</a></li>
                        <li class="separator"></li>
                        <li><a href="/location">Location &amp; Hours</a></li>
                        <li class="separator"></li>
                        <li><a href="/contact">Contact</a></li>
                        <li class="separator"></li>
                        @guest
                            <li>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="separator"></li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </header>
            <main class="page-content">
                @yield('content')
            </main>
            <footer class="text-muted">
                NADIA’S GARDEN RESTAURANT IS A FICTITIOUS BRAND CREATED BY LYNDA.COM SOLELY FOR THE PURPOSE OF TRAINING.
                ALL PRODUCTS AND PEOPLE ASSOCIATED WITH NADIA’S GARDEN RESTAURANT ARE ALSO FICTITIOUS.
                ANY RESEMBLANCE TO REAL BRANDS, PRODUCTS, OR PEOPLE IS PURELY COINCIDENTAL.
                INFORMATION PROVIDED ABOUT THE PRODUCT IS ALSO FICTITIOUS AND SHOULD NOT BE CONSTRUED TO BE REPRESENTATIVE
                OF ACTUAL PRODUCTS ON THE MARKET IN A SIMILAR PRODUCT CATEGORY.
            </footer>
        </div>
</body>
</html>
