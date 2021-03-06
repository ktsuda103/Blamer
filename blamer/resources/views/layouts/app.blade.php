<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/blamer.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand app-name" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('????????????') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('????????????') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item nav-rank">
                                <a href="{{ route('rank') }}">
                                    <div class="nav-link"><i class="fas fa-crown mr-2"></i>?????????????????????
                                        <div class="d-inline">
                                            @if($point['point'] >= 30000)
                                                ???
                                            @elseif($point['point'] >= 10000)
                                                King of Blamer
                                            @elseif($point['point'] >= 5000)
                                                ??????Blamer
                                            @elseif($point['point'] >= 2000)
                                                ??????Blamer
                                            @elseif($point['point'] >= 500)
                                                ??????Blamer
                                            @elseif($point['point'] > 0)
                                                ????????????Blamer
                                            @else
                                                ??????
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('post/create') }}"><i class="fas fa-plus mr-2"></i>????????????</a>
                            </li>
                            <li id="navbarDropdown" class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user mr-2"></i>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('mypage/index') }}">
                                        ???????????????
                                    </a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#logout" href="{{ route('logout') }}">???????????????</a>   
                                </div>
                            </li>
                        @endguest
                        <li id="navbarDropdown" class="nav-item dropdown">
                            <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                ?????????
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('contact/index') }}" class="dropdown-item">??????????????????</a>
                                <a href="{{ route('user_policy') }}" class="dropdown-item">????????????</a>
                                <a href="{{ route('privacy_policy') }}" class="dropdown-item">??????????????????????????????</a>
                            </div>
                        </li>        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="modal" id="logout" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>???????????????</h4>
                        </div>
                        <div class="modal-body">
                            <label>??????????????????????????????</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">?????????</button>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary">?????????????????????</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
