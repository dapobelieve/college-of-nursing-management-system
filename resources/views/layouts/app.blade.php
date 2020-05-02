<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/Oysconmetrans.png')}}" type="image/png" sizes="16x16">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('images/oysconmelogo.jpg')}}" alt="logo">
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

        <main class="py-4">
          <div class="container">
              <div class="row justify-content-center">
                @if($section != "")
                <div class="col-xs-3">
                  <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action @if ($section == 'dashboard') active @endif" id="list-home-list"  href="{{route('portal.dashboard')}}" role="tab" aria-controls="home">Home</a>
                    <a class="list-group-item list-group-item-action @if ($section == 'tuition') active @endif" id="list-profile-list"  href="{{route('portal.tuition')}}" role="tab" aria-controls="profile">Pay Tuition</a>
                    <a class="list-group-item list-group-item-action @if ($section == 'coursereg') active @endif" id="list-messages-list"  href="{{route('portal.coursereg')}}" role="tab" aria-controls="messages">Course Registration</a>
                    <a class="list-group-item list-group-item-action @if ($section == 'tuitionhistory') active @endif" id="list-settings-list"  href="{{route('portal.tuitionhistory')}}" role="tab" aria-controls="settings">Payment History</a>
                    <a class="list-group-item list-group-item-action @if ($section == 'reghistory') active @endif" id="list-settings-list"  href="{{route('portal.reghistory')}}" role="tab" aria-controls="settings">Registration History</a>
                    <br>
                      <ul>
                        <li class="danger"> <a href="#">Demoted Student</a></li>
                      </ul>
                  </div>
                </div>
                @endif
          @yield('content')
        </main>
    </div>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif




  @yield('script')
  </script>

</body>
</html>
