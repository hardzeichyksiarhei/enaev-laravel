<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('meta')

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/template/48x48.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <title>Roman Enaev</title>
</head>
<body>
    <div class="app" id="app">

        <a class="logo" href="/" id="logo">
            <svg class="svg svg-logo-icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/template/svg-sprite.svg#logo-icon"></use>
            </svg>
        </a>
        <div class="menu-btn" id="menubtn"><span></span><span></span><span></span></div>
        <div class="nav" id="nav">
            <ul></ul>
        </div>
        <div class="menu" id="menu">
            <div class="menu-bg"><span></span><span></span><span></span><span></span><b>MENU</b></div>
            <div class="menu-scroll">
                <div class="menu-cnt">
                    <div class="menu-cnt-right">
                        <ul>
                            <li>
                                <a class="menu-it" href="{{ route('resume') }}">
                                    <div class="menu-it-title">Резюме</div>
                                    <div class="menu-it-text">Таланты, места работы, програмы с которыми работаю</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu-it" href="{{ route('work') }}">
                                    <div class="menu-it-title">Проекты и кейсы</div>
                                    <div class="menu-it-text">Мое портфолио, собранное за 10 лет работы</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu-it" href="{{ route('consultation') }}">
                                    <div class="menu-it-title">Консультация</div>
                                    <div class="menu-it-text">Таланты, места работы, програмы с которыми работаю</div>
                                </a>
                            </li>
                            <li><a class="menu-it" href="{{ route('cooperation') }}">
                                    <div class="menu-it-title">Сотрудничество</div>
                                    <div class="menu-it-text">Таланты, места работы, програмы с которыми работаю</div>
                                </a>
                            </li>
                            <li><a class="menu-it" href="{{ route('contacts') }}">
                                    <div class="menu-it-title">Контакты</div>
                                    <div class="menu-it-text">Таланты, места работы, програмы с которыми работаю</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

    </div>

    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    @if(in_array(Route::currentRouteName(), ['consultation', 'contacts', 'cooperation']))
        <script src="{{ asset('js/blocks.js') }}"></script>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>