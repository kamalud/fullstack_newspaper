<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E Newspaper') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="main_app">
      <div class="main_header">
        <header class="top_header">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <router-link :to="{name:'home'}">
                           <img src="{{asset('/frontend')}}/img/images.png"  alt="logo">
                        </router-link>
                    </div>
                    <date-time></date-time>

                </div>
                <div class="col-md-6">
                    <div class="top_image">
                       <img src="" alt=""> 
                    </div>
                </div>
                <div class="col-md-2">
                  <div class="login_menu">
                  <ul class="">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="">
                                            <router-link class="" :to="{name:'login'}">Login</router-link>
                                            <!-- <a class="" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="">
                                        <!-- <router-link class="" :to="{name:'register'}">Register</router-link> -->
                                            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class=" dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                  </div>
                </div>
            </div>
        </header>
        </div>
           
        <menu-ber></menu-ber>
        

        <main class="py-4">
            @yield('content')
        </main>

        <footerpart></footerpart>
    </div>
</body>
</html>
