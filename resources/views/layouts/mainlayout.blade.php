<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @section('title') Агрегатор| @show
    </title>
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{asset('css/customer.css') }}"/>
    {{--    @yield('stylesheets')--}}

</head>
<body>
<div class="container-fluid">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/realno24-logo.png')}}" class="main-logo-img">
            </a>
{{--            <button--}}
{{--                class="navbar-toggler"--}}
{{--                type="button"--}}
{{--                data-toggle="collapse"--}}
{{--                data-target="#navbarNavDropdown"--}}
{{--                aria-controls="navbarNavDropdown"--}}
{{--                aria-expanded="false"--}}
{{--                aria-label="Toggle navigation"--}}
{{--            >--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}


            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    @guest
                        <li class="nav-item">
                            <a class="nav-link  text-black-50" href="{{ route('login') }}">Войти</a>
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
                    <li class="nav-item">

                        <form class="form-inline searchform" method="POST" action="/search">
                            @csrf
                            <div class="input-group input-group-sm mb-3 border-white">
                                <input
                                    class="form-control bg-transparent"
                                    type="search"
                                    placeholder="Текст для поиска"
                                    aria-label="Search"
                                    name="searchStr"
                                    aria-label="" aria-describedby="basic-addon1"
                                />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary border-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </li>

                </ul>

            </div>


        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
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


            </div>
        </nav>
    </header>

    <div class="main">

{{--        <div class="left-nav">--}}

{{--            <!-- Attention! Do not modify this code; END CODE -->--}}
{{--            <div id="ml_5e40501f" style="margin-left: 15px;">--}}
{{--                <div style="padding:0;margin: 0;" id="ml_5e40501f_i" v='1.1'--}}
{{--                     a='{"t":"v","lang":"ru","ids":[],"a_dt_bg":"#757575","a_dt_c":"#FFFFFF","a_wn_bg":"#424242","a_wn_c":"#FFFFFF","a_wi_bg":"#757575","a_wi_c":"#FFFFFF"}'></div>--}}
{{--                <div id="ml_5e40501f_c" style="padding:0;margin:0;padding:7px 5px;"><img--}}
{{--                        src="https://meteolabs.ru/assets/img/logo_z_b.svg"--}}
{{--                        style="width:15px;opacity:0.1;margin-right:5px;position:relative;top:1px;display:inline-block;"><a--}}
{{--                        href="https://meteolabs.ru/погода_москва/сегодня/"--}}
{{--                        style="color:#cccccc;font-size:12px;text-decoration:none;" target="_blank" id="ml_5e40501f_u">Погода--}}
{{--                        сегодня</a></div>--}}
{{--            </div>--}}
{{--            <script async src="https://app.meteolabs.ru/js/?id=ml_5e40501f"></script>--}}

{{--        </div>--}}


{{--        <div class="content">--}}
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

