<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
<body style="background-color:pink;">
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

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admission.logout') }}">{{ __('Logout') }}</a>
                            </li>
                    </ul>
                    </div>
                </div>
                </nav>


        <main class="py-4">
          <div class="container">
              <div class="row justify-content-center">

                <div class="col-md-3">
                      <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action @if ($section == 'dashboard') active @endif"  href="{{route('admission.dashboard')}}" role="tab" aria-controls="home">Home</a>
                        @if($section == 'dashboard')<a class="list-group-item list-group-item-action @if ($section == 'application') active @endif"   href="{{route('application.index')}}" role="tab" aria-controls="profile">Application- Step One</a>@endif
                        @if($section == 'applicationtwo')<a class="list-group-item list-group-item-action @if ($section == 'applicationtwo') active @endif"   href="{{route('application.steptwo')}}" role="tab" aria-controls="messages">Application- Step two</a>@endif
                        @if($section == 'payment')<a class="list-group-item list-group-item-action @if ($section == 'payment') active @endif"   href="{{route('payapplication.index')}}" role="tab" aria-controls="settings">Pay Application Form</a>@endif
                        @if($section == 'upload')<a class="list-group-item list-group-item-action @if ($section == 'upload') active @endif"   href="{{route('upload.index')}}" role="tab" aria-controls="settings">Upload Passport</a>@endif
                        @if($section == 'dashboard' or $section == 'printout')<a class="list-group-item list-group-item-action @if ($section == 'printout') active @endif"  href="{{route('printout.index')}}" role="tab" aria-controls="settings">Print Form</a>@endif
                      </div>
                </div>
                <div class="col-md-9">

          @yield('content')
        </div>
        </div>
        </div>
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


  $(document).ready(function(){
      $('#js-admission-2').hide();

  });



  @yield('script')
  </script>

</body>
</html>
