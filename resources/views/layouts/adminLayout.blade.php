<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel')." Admin mode" }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin') }}">
                        <img src="{{asset('img/logo-customer.jpg')}}" class="main-logo-img">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item {{request()->routeIs('admin')?"current-menu":""}}">
                            <a class="nav-link" href="{{route('admin')}}">Главная</a>
                        </li>
                        <li class="nav-item {{request()->routeIs('admin.infoSourcesList')?"current-menu":""}}">
                            <a class="nav-link" href="{{route('admin.infoSourcesList')}}">Источники новостей</a>
                        </li>

                        <li class="nav-item {{request()->routeIs('admin.categoriesList')?"current-menu":""}}">
                            <a class="nav-link" href="{{route('admin.categoriesList')}}">Категории новостей</a>
                        </li>

                        <li class="nav-item {{request()->routeIs('admin.alternativeSourcesList')?"current-menu":""}}">
                            <a class="nav-link" href="{{route('admin.alternativeSourcesList')}}">Источники новостей JSON-формат</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">На основной сайт</a>
                        </li>
                    </ul>
                </div>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="content">
            @if (session()->has('proceed_status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get('proceed_status')}}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @section('scripts')
    @show


</body>
</html>
