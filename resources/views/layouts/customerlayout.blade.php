<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @section('title') Агрегатор| @show
    </title>
    <link rel="stylesheet" href="{{asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{asset('css/customer.css') }}"/>
</head>
<body>
<div class="container-fluid">
    <header>

        {{--            Верхнее меню. Общее--}}
        <nav class="navbar navbar-expand-lg upper-nav">
{{--            <div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
                <!-- Общее меню -->
                <ul class="navbar-nav">
                    <li class="nav-item {{request()->routeIs('home')?'current-menu':''}}">
                        <a class="nav-link" href="{{route('home')}}">Главная </a>
                    </li>

                    <li class="nav-item dropdown {{(request()->routeIs('infoEnquieries.create')||request()->routeIs('customer.feedback'))?'current-menu':''}}">
                        <a
                            class="nav-link dropdown-toggle"
                            href="{{route('customer.categories')}}"
                            id="navbarDropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Запросы и обратная связь
                        </a>
                        <div
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <a @guest
                               class="dropdown-item disabled"
                               @else
                               class="dropdown-item"
                               @endguest
                               href="{{route('customer.infoEnquiery')}}">Запрос информации</a>
                            <a class="dropdown-item" href="{{route('customer.feedback')}}">Оставить отзыв о
                                проекте</a>

                        </div>
                    </li>

                    @if (Auth::user()&&Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin')}}">Панель администратора</a>
                        </li>
                    @endif


                </ul>

                <!-- Аутентификация -->
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}">Войти</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('vkLogin')}}">
                                    <i class="fa fa-vk" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('fbLogin')}}">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ghLogin')}}">
                                    <i class="fa fa-github" aria-hidden="true"></i>
                                </a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{route('customer.personalAccount')}}">
                                    Личный кабинет
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>


                        </li>
                    @endguest
                </ul>
{{--            </div>--}}
        </nav>

        <!-- Ссылки на категории и поиск-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/realno24-logo.png')}}" class="main-logo-img">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Ссылки по категориям -->
                <ul class="navbar-nav">
                    <li class="nav-item {{request()->routeIs('home')?'current-menu':''}}">
                        <a class="nav-link" href="{{route('home')}}">Главная </a>
                    </li>
                    <li class="nav-item {{request()->routeIs('customer.categories')?'current-menu':''}}">
                        <a class="nav-link" href="{{route('customer.categories')}}">Категории новостей</a>
                    </li>

                    <li class="nav-item dropdown {{(request()->routeIs('infoEnquieries.create')||request()->routeIs('customer.feedback'))?'current-menu':''}}">
                        <a
                            class="nav-link dropdown-toggle"
                            href="{{route('customer.categories')}}"
                            id="navbarDropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Запросы и обратная связь
                        </a>
                        <div
                            class="dropdown-menu upper-nav__drop-down"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <a @guest
                               class="dropdown-item disabled-inblack"
                               @else
                               class="dropdown-item"
                               @endguest
                               href="{{route('customer.infoEnquiery')}}">Запрос информации</a>
                            <a class="dropdown-item" href="{{route('customer.feedback')}}">Оставить отзыв о
                                проекте</a>

                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('customer.homeAlt')}}">Главная </a>
                    </li>

                    @if (Auth::user()&&Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin')}}">Панель администратора</a>
                        </li>
                    @endif


                </ul>

                <!-- Поиск статей -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">

                        <form class="form-inline searchform" method="POST" action="/search">
                            @csrf
                            <div class="input-group input-group-sm mb-3 border-white">
                                <input
                                    class="form-control bg-transparent border-secondary"
                                    type="search"
                                    placeholder="Текст для поиска"
                                    aria-label="Search"
                                    name="searchStr"
                                    aria-label="" aria-describedby="basic-addon1"
                                />
                                <div class="input-group-append">
                                    <button class="btn border-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </li>

                </ul>

            </div>
        </nav>
    </header>

    <div class="main">
            @if (session()->has('proceed_status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get('proceed_status')}}
                </div>
            @endif

            @if (session()->has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session()->get('error_message')}}
                </div>
            @endif

            @yield('content')
{{--        </div>--}}


    </div>


    @section('footer')
        <footer class="navbar-fixed-bottom footer-classic">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-6"></div>
                        <h5>Контактная информация</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="contact-list">
                                    <dt>Адрес:</dt>
                                    <dd>115597 Кемеровская область, Новокузнецк, проспект Курако 49а, каб. 404</dd>
                                </dl>
                            </div>
                            <div class="col-md-6">

                                <dl class="contact-list">
                                    <dt>Телефоны для связи:</dt>
                                    <dd>
                                        <ul class="unmarked">
                                            <li>+7 (3432) 88-8888</li>
                                            <li>_7 (983) 221-0274</li>
                                        </ul>

                                    </dd>
                                </dl>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <dl class="contact-list">
                                    <dt>email:</dt>
                                    <dd><a href="mailto:#">kevlampiev@gmail.com</a></dd>
                                </dl>

                            </div>
                            <div class="col-md-6">
                                <dl class="contact-list">
                                    <dt>Мы в социальных сетях</dt>
                                    <dd><a href="mailto:kevlampiev@gmail.com">kevlampiev@gmail.com</a></dd>
                                </dl>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <h5>Быстрые ссылки </h5>
                        <ul class="nav-list">
                            <li><a href="#">About</a></li>
                            <li><a href="{{route('privacy')}}">Политика конфиденциальности</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>

                </div>
                <div class="row bg-dark">
                    <div class="col-md-8">
                        &copy; Все права защищены
                    </div>
                    <div class="col-md-4">
                        Сибирь, 2020 г
                    </div>
                </div>
            </div> <!-- row-->

            {{--</div>--}}
            {{--</div>--}}
        </footer>
    @show
</div>

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
@show

</body>
</html>

